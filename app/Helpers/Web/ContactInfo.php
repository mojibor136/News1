<?php

use App\Models\ContactInfo;

function getContactInfo(){
    return ContactInfo::first();
}