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

    public function toggleStatus( $id ) {
        $user = UserModel::find( $id );

        if ( $user ) {
            $user->status = $user->status === 'active' ? 'deactive' : 'active';
            $user->save();
        }
    }

    public function render() {
        $users = UserModel::paginate( 14 );
        return view( 'livewire.user', [ 'users' => $users ] );
    }
}
