<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\State;

class Statecitydropdown extends Component
{
    public $states;
    public $cities;
    public $selectedState = NULL;

    public function mount()
    {
        $this->states = State::all();
        $this->cities = collect();
    }   

    public function render()
    {
        return view('livewire.statecitydropdown');
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
        $this->cities = City::where('state_id', $state)->get();
        }
    }
}
