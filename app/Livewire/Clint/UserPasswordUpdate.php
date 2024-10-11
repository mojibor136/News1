<?php

namespace App\Livewire\Clint;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPasswordUpdate extends Component {
    public $old, $new, $userId;

    protected $rules = [
        'old' => 'required',
        'new' => 'required',
    ];

    public function mount( $userId ) {
        $this->userId = $userId;
    }

    public function updatePassword() {
        $this->validate();

        $user = User::findOrFail( $this->userId );

        if ( Hash::check( $this->old, $user->password ) ) {
            $user->password = Hash::make( $this->new );
            $user->save();

            session()->flash( 'message', 'Password updated successfully.' );
        } else {
            $this->addError( 'old', 'The provided old password does not match our records.' );
        }

        $this->reset( 'old', 'new' );
    }

    public function render() {
        return view( 'livewire.clint.user-password-update' );
    }
}
