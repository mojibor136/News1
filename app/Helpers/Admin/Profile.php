<?php
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

function AdminInfo() {
    return Auth::guard( 'admin' )->user();
}

function getCompany(){
  return  Admin::first();
}
