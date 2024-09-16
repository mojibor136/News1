<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as UserModel;
use Livewire\Pagination;

class User extends Component {
    public $user;

    public function deleteUser( $id ) {
        UserModel::findOrFail( $id )->delete();

        session()->flash( 'message', 'User deleted successfully.' );
    }

    public function render() {
        $users = UserModel::paginate( 6 );
        return view( 'livewire.user', [ 'users' => $users ] );
    }
}
