<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class EventIndex extends Component
{
    use Interactions;
    use WithPagination;

    public $dayLabels = ['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB'];

    public $monthLabels = ['0', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    #[Url('ano', except: null)]
    public $currentYear;

    #[Url('mes', except: null)]
    public $currentMonth;

    #[Url('dia', except: null)]
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

        $date = strtotime($currentYear.'-'.$this->currentMonth);
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

    public function selectDay($day = null)
    {
        if ($this->currentDay != $day) {
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
            ->withCount(['members' => function (Builder $query) {
                $query->where('answer', 'Sim');
            }])
            ->orderBy('date', 'asc')->orderBy('time', 'asc')
            ->get();

        foreach ($events as $event) {
            $event['day'] = intval(Carbon::parse($event->date)->format('d'));
        }
        $this->events = $events;
    }

    public function removeEvent($event): void
    {
        $this->dialog()
            ->question('Remover evento',
                'Tem certeza que deseja remover o evento '.$event['title'].', do dia '.\Carbon\Carbon::parse($event['date'])->format('d/m/Y').'?')
            ->confirm(method: 'doRemoveEvent', params: $event['id'])
            ->cancel()
            ->send();
    }

    public function doRemoveEvent($event)
    {
        try {
            Event::query()->where('id', $event)->delete();
            $this->toast()->success('Evento removido com sucesso.')->send();
        } catch (\Throwable $th) {
            $this->toast()->error('Ocorreu um erro ao remover evento.')->send();
            dd($th);
        }
    }

    public function render()
    {
        $this->load($this->currentMonth, $this->currentYear);

        return view('livewire.event.event-index')->title('Eventos');
    }
}
