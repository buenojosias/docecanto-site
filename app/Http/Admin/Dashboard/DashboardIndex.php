<?php

namespace App\Http\Admin\Dashboard;

use App\Models\Event;
use App\Models\Member;
use App\Models\Queue;
use App\Models\Song;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class DashboardIndex extends Component
{
    use Actions;
    use WithPagination;

    public $name;
    public $members_count;
    public $songs_count;
    public $queues_count;
    public $events;
    public $births;

    public function mount()
    {
        $this->name = strstr(auth()->user()->name, ' ', true);
        $this->members_count = Member::query()->where('status', 'Ativo')->count();
        $this->songs_count = Song::query()->count();
        $this->queues_count = Queue::query()->whereIn('status', ['Pendente', 'Vizualizado'])->count();

        $this->events = Event::query()
            ->whereDate('date', '>=', date('Y-m-d'))
            ->orderBy('date', 'asc')->orderBy('time', 'asc')
            ->get();

        // foreach ($this->events as $event) {
        //     if (Carbon::parse($event->date)->format('Y-m-d') === Carbon::parse(now())->format('Y-m-d')) {
        //         $event->date = 'Hoje';
        //     } else if ($event->date->format('Y-m-d') === Carbon::parse(now()->addDay())->format('Y-m-d')) {
        //         $event['date'] = 'Amanhã';
        //     } else {
        //         $event['date'] = Carbon::parse($event->date)->format('d/m');
        //     }
        // }

        $this->births = Member::query()
            ->whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(birth) AND DAYOFYEAR(curdate()) + 4 >=  dayofyear(birth)')
            ->orWhereRaw('DAYOFYEAR(curdate()) >= DAYOFYEAR(birth) AND DAYOFYEAR(curdate()) - 3 <=  dayofyear(birth)')
            ->orderByRaw('DAYOFYEAR(birth)')
            ->where('status', 'Ativo')
            ->get();
    }

    public function render()
    {
        return view('admin.dashboard.dashboard-index');
    }
}
