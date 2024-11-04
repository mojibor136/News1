<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Logo;
use App\Models\AdsLogo;
use App\Models\NavLogo;
use Livewire\WithFileUploads;

class LogoManage extends Component {

    use WithFileUploads;

    public $logo;
    public $navLogo;
    public $adsLogo;
    public $currentLogo;
    public $currentAdsLogo;
    public $currentNavLogo;

    public function mount() {
        $this->currentLogo = Logo::first();
        $this->currentNavLogo = NavLogo::first();
        $this->currentAdsLogo = AdsLogo::first();
    }

    public function submitLogo() {
        if ( $this->logo ) {
            $path = $this->logo->store( 'logos' );

            $existingLogo = Logo::first();

            if ( $existingLogo ) {
                $existingLogo->update( [ 'path' => $path ] );
            } else {
                Logo::create( [ 'path' => $path ] );
            }

            $this->currentLogo = Logo::first();
            $this->logo = null;
        }
    }

    public function deleteLogo( $id ) {
        $logo = Logo::findOrFail( $id );
        $logo->delete();

        $this->currentLogo = Logo::first();
    }

    public function submitNavLogo() {

        if ( $this->navLogo ) {
            $path = $this->navLogo->store( 'logos' );

            $existingNavLogo = NavLogo::first();

            if ( $existingNavLogo ) {
                $existingNavLogo->update( [ 'logo' => $path ] );
            } else {
                NavLogo::create( [ 'logo' => $path ] );
            }

            $this->currentNavLogo = NavLogo::first();
            $this->navLogo = null;
        }
    }

    public function deleteNavLogo( $id ) {
        $navLogo = NavLogo::findOrFail( $id );
        $navLogo->delete();

        $this->currentNavLogo = NavLogo::first();
    }

    public function submitAdsLogo() {
        if ( $this->adsLogo ) {
            $path = $this->adsLogo->store( 'ads_logos' );

            $existingAdsLogo = AdsLogo::first();

            if ( $existingAdsLogo ) {
                $existingAdsLogo->update( [ 'path' => $path ] );
            } else {
                AdsLogo::create( [ 'path' => $path ] );
            }

            $this->currentAdsLogo = AdsLogo::first();
            $this->adsLogo = null;
        }
    }

    public function deleteAdsLogo( $id ) {
        $adsLogo = AdsLogo::findOrFail( $id );
        $adsLogo->delete();

        $this->currentAdsLogo = AdsLogo::first();
    }

    public function render() {
        return view( 'livewire.logo-manage', [
            'currentLogo' => $this->currentLogo,
            'currentAdsLogo' => $this->currentAdsLogo,
            'currentNavLogo' => $this->currentNavLogo,
        ] );
    }
}
