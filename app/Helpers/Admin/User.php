<?php
use App\Models\User;

function UserCount() {
    return User::count();
}
