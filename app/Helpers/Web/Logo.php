<?php

use App\Models\Logo;
use App\Models\AdsLogo;
use App\Models\Admin;

function getLogo() {
    return Logo::first();
}

function getAdsLogo() {
    return AdsLogo::first();
}

function getIcon() {
    return Admin::first();
}