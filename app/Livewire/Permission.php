<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserPermission;
use App\Models\languagePermission as LanguagePermission;

class Permission extends Component {
    public $registrationPermission;
    public $languagePermission;

    public function mount() {
        $this->registrationPermission = UserPermission::value( 'status' );
        $this->languagePermission = LanguagePermission::value( 'status' );
    }

    public function toggleRegistrationPermission() {
        $permission = UserPermission::first();

        if ( $permission ) {
            $permission->status = $permission->status == 1 ? 0 : 1;
            $permission->save();

            $this->registrationPermission = $permission->status;
        }
    }

    public function toggleLanguagePermission() {
        $permission = LanguagePermission::first();

        if ( $permission ) {
            $permission->status = $permission->status == 1 ? 0 : 1;
            $permission->save();

            $this->languagePermission = $permission->status;
        }
    }

    public function render() {
        return view( 'livewire.permission' );
    }
}
