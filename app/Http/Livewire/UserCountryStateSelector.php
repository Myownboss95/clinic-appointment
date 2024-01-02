<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class UserCountryStateSelector extends Component
{
    public $countries;

    public $selectedCountry;

    public $states;

    public $selectedState;

    // Props for default user values
    public $userCountry;

    public $userState;

    public function mount()
    {
        $this->getCountries();

        // Set default values from user props
        if ($this->userCountry) {
            $this->selectedCountry = $this->userCountry;
            $this->getStates($this->userCountry);

            // Set default state if user state is provided
            if ($this->userState) {
                $this->selectedState = $this->userState;
            }
        }
    }

    public function render()
    {
        return view('livewire.user-country-state-selector');
    }

    public function getCountries()
    {
        $response = Http::get(route('location.countries'));
        $this->countries = $response->json('countries');
    }

    public function getStates($country)
    {
        $response = Http::get(route('location.states', $country));
        $data = $response->json();

        $this->selectedCountry = $data['country'];
        $this->states = $data['states'];
    }
}
