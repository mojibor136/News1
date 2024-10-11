<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminPasswordUpdate extends Component {
    public $old, $new, $adminId;

    protected $rules = [
        'old' => 'required',
        'new' => 'required',
    ];

    public function mount( $adminId ) {
        $this->adminId = $adminId;
    }

    public function updatePassword() {
        $this->validate();

        $admin = Admin::findOrFail( $this->adminId );

        if ( Hash::check( $this->old, $admin->password ) ) {
            $admin->password = Hash::make( $this->new );
            $admin->save();

            session()->flash( 'message', 'Password updated successfully.' );
        } else {
            $this->addError( 'old', 'The provided old password does not match our records.' );
        }

        $this->reset( 'old', 'new' );
    }

    public function render() {
        return view( 'livewire.admin-password-update' );
    }
}
