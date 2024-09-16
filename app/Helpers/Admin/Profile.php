<?php
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

function AdminInfo() {
    return Auth::admin();
}
