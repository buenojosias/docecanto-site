<?php

namespace App\Http\Admin\Event;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class EventIndex extends Component
{
    use Actions;
    use WithPagination;

    public $dayLabels = array('DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB');
    public $monthLabels = array('0', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    public $currentYear;
    public $currentMonth;
    public $currentDay;
    public $daysInMonth;
    public $firstWeekdayOfMonth;
    public $lastWeekdayOfMonth;
    public $remainder;

    public $nextMonth;
    public $nextYear;
    public $previusMonth;
    public $previusYear;

    public $events;
    public $periodEvents;
    public $form;
    public $method;
    public $showFormModal;

    public function mount($currentMonth = null, $currentYear = null)
    {
        $this->currentMonth = $currentMonth;
        $this->currentYear = $currentYear;
    }

    public function load($currentMonth, $currentYear)
    {
        $this->currentMonth = $currentMonth ?? intval(date('m'));
        $this->currentYear = $currentYear ?? intval(date('Y'));

        $date = strtotime($currentYear . '-' . $this->currentMonth);
        $this->daysInMonth = intval(date('t', $date));

        $firstDayOfMonth = date('Y-m-01', $date);
        $this->firstWeekdayOfMonth = date('w', (strtotime($firstDayOfMonth)));
        $lastDayOfMonth = date('Y-m-t', $date);
        $this->lastWeekdayOfMonth = date('w', (strtotime($lastDayOfMonth)));

        $this->remainder = $this->lastWeekdayOfMonth < 6 ? 6 - $this->lastWeekdayOfMonth : 0;
        $this->nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth) + 1;
        $this->nextYear = $this->currentMonth == 12 ? intval($this->currentYear) + 1 : $this->currentYear;
        $this->previusMonth = $this->currentMonth == 1 ? 12 : intval($this->currentMonth) - 1;
        $this->previusYear = $this->currentMonth == 1 ? intval($this->currentYear) - 1 : $this->currentYear;

        $this->getEvents();
    }

    public function goToNextMonth()
    {
        $this->currentMonth = $this->nextMonth;
        $this->currentYear = $this->nextYear;
        $this->currentDay = null;
        $this->load($this->currentMonth, $this->currentYear);
    }

    public function goToPreviusMonth()
    {
        $this->currentMonth = $this->previusMonth;
        $this->currentYear = $this->previusYear;
        $this->currentDay = null;
        $this->load($this->currentMonth, $this->currentYear);
    }

    public function selectDay($day = null) {
        if($this->currentDay != $day) {
            $this->currentDay = $day;
        } else {
            $this->currentDay = null;
        }
    }

    public function getEvents()
    {
        $events = Event::query()
            ->whereMonth('date', $this->currentMonth)
            ->whereYear('date', $this->currentYear)
            ->orderBy('date', 'asc')->orderBy('time', 'asc')
            ->get();

        foreach($events as $event) {
            $event['day'] = intval(Carbon::parse($event->date)->format('d'));
        }
        $this->events = $events;
    }

    public function removeEvent($event): void
    {
        $this->dialog()->confirm([
            'title' => 'Remover evento',
            'description' => 'Tem certeza que deseja remover o evento '.$event['title'].', do dia '.\Carbon\Carbon::parse($event['date'])->format('d/m/Y').'?',
            'method' => 'doRemoveEvent',
            'params' => ['event' => $event['id']],
            'acceptLabel' => 'Confirmar',
            'rejectLabel' => 'Cancelar',
        ]);
    }

    public function doRemoveEvent($event) {
        try {
            Event::query()->where('id', $event)->delete();
            $this->notification()->success($description = 'Evento removido com sucesso.');
        } catch (\Throwable $th) {
            $this->notification()->error($description = 'Ocorreu um erro ao remover evento.');
            dd($th);
        }
    }

    public function render()
    {
        $this->load($this->currentMonth, $this->currentYear);
        return view('admin.event.event-index');
    }
}
