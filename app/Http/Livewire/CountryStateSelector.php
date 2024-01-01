<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CountryStateSelector extends Component
{
    public $countries;

    public $selectedCountry;

    public $states;

    public function mount()
    {
        // Fetch countries when the component is mounted
        $this->getCountries();
    }

    public function render()
    {
        return view('livewire.country-state-selector');
    }

    public function getCountries()
    {
        // Fetch countries from the controller's countries method
        $response = Http::get(route('location.countries'));
        $this->countries = $response->json('countries');
    }

    public function getStates($country)
    {
        // Fetch states based on the selected country from the controller's states method
        $response = Http::get(route('location.states', $country));
        $this->selectedCountry = $response->json('country');
        $this->states = $response->json('states');
    }
}
