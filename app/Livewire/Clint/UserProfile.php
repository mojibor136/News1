<?php

namespace App\Livewire\Clint;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component {

    public $name;
    public $email;

    public function mount() {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function UpdateProfile() {
        $this->validate( [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
        ] );

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        session()->flash( 'message', 'Profile updated successfully.' );
    }

    public function render() {
        return view( 'livewire.clint.user-profile' );
    }
}
