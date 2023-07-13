<?php

namespace App\Http\Admin\Rating;

use Livewire\Component;

class RatingItem extends Component
{

    public $rating;
    public $showFormModal = false;


    public function mount($rating)
    {
        $this->rating = $rating;
    }

    public function render()
    {
        return view('admin.rating.rating-item');
    }
}
