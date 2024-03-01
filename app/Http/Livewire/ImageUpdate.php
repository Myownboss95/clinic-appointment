<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpdate extends Component
{
    use WithFileUploads;

    public $user;

    public $image;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->image = $user->image;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'image' => 'nullable|sometimes|image|max:5000',
        ]);
    }

    public function updateImage()
    {

        $this->validate([
            'image' => 'nullable|sometimes|image|max:5000',
        ]);

        $imageToShow = $this->user->image ?? null;

        $this->user->update(
            [
                'image' => $this->image ? $this->image->store('profile_pictures', 'public') : $imageToShow,
            ]
        );

        toastr()->timeOut(10000)->addSuccess('Image updated successfully.');
    }

    public function render()
    {
        return view('livewire.image-update');
    }
}
