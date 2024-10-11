<?php
use App\Models\SocialLink;

function getSocialLinks() {
    return SocialLink::all();
}