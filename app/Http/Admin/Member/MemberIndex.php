<?php

namespace App\Http\Admin\Member;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class MemberIndex extends Component
{
    use Actions;
    use WithPagination;

    public function render()
    {
        return view('admin.member.member-index');
    }
}
