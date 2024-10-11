<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SocialLink;

class SocialMediaLinkManager extends Component {
    public $socialMedia;
    public $link;
    public $socialLinks;

    protected $rules = [
        'socialMedia' => 'required',
        'link' => 'required|url',
    ];

    public function mount() {
        $this->socialLinks = SocialLink::all();
    }

    public function submit() {
        $this->validate();

        SocialLink::create( [
            'name' => $this->socialMedia,
            'link' => $this->link,
        ] );

        $this->socialLinks = SocialLink::all();

        $this->socialMedia = '';
        $this->link = '';
    }

    public function edit( $id ) {
        $socialLink = SocialLink::find( $id );
        if ( $socialLink ) {
            $this->socialMedia = $socialLink->name;
            $this->link = $socialLink->link;

            $socialLink->delete();
            $this->socialLinks = SocialLink::all();
        }
    }

    public function delete( $id ) {
        $socialLink = SocialLink::find( $id );
        if ( $socialLink ) {
            $socialLink->delete();
            $this->socialLinks = SocialLink::all();
        }
    }

    public function render() {
        return view( 'livewire.social-media-link-manager' );
    }
}
