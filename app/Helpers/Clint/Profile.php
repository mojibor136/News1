<?php
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function ClintInfo() {
    return Auth::user();
}
