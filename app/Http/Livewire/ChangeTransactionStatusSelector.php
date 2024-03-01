<?php

namespace App\Http\Livewire;

use App\Constants\TransactionStatusTypes;
use App\Models\Transaction;
use App\Notifications\UserTransactionNotification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangeTransactionStatusSelector extends Component
{
    public $transactionId;

    public $selectedStatus;

    public $transaction;

    public $password;

    public $showPasswordField = false; 

    public $showPasswordModal = false; 

    public function mount($transactionId)
    {
        $this->transactionId = $transactionId;
        $this->transaction = Transaction::where('ref', $this->transactionId)->first();
        $this->selectedStatus = $this->transaction->status;
    }

    public function render()
    {
        return view('livewire.change-transaction-status-selector');
    }

    public function updateSelectedStatus()
    {
        $this->dispatch('toggle-password-modal', $this->selectedStatus !== $this->transaction->status);
    }

    public function updateTransactionStatus()
    {
        if (!Hash::check($this->password, auth()->user()->password)) {
            toastr()->timeOut(10000)->addError('Incorrect Password');

            return redirect()->route(role(auth()->user()->role_id) . '.transactions.show', $this->transaction->id);
        }

        if (auth()->user()->role_id !== 3) {
            if ($this->selectedStatus == TransactionStatusTypes::PENDING->value) {
                toastr()->timeOut(10000)->addError('You can either confirm or reject transactions');

                return redirect()->route(role(auth()->user()->role_id).'.transactions.show', $this->transaction->id);
            }
        }
        
        $this->transaction->update([
            'status' => $this->selectedStatus,
            'confirmed_by' => auth()->user()->id,
        ]);

        toastr()->timeOut(10000)->addSuccess('Status updated successfully.');
        $this->transaction->user->notify(new UserTransactionNotification($this->transaction->user, $this->transaction));

        return redirect()->route(role(auth()->user()->role_id) . '.transactions.show', $this->transaction->id);

       

    }
}
