<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;

class AdminProfile extends Component {

    public $name;
    public $email;

    public function mount() {
        $admin = Admin::first();
        if ( $admin ) {
            $this->name = $admin->name;
            $this->email = $admin->email;
        }
    }

    public function UpdateProfile() {
        $this->validate( [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
        ] );

        $admin = Admin::first();
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->save();

        session()->flash( 'message', 'Profile updated successfully.' );
    }

    public function render() {
        return view( 'livewire.admin-profile' );
    }
}
