<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Logo;
use App\Models\AdsLogo;
use Livewire\WithFileUploads;

class LogoManage extends Component {

    use WithFileUploads;

    public $logo;
    public $adsLogo;
    public $currentLogo;
    public $currentAdsLogo;

    public function mount() {
        $logo = Logo::first();
        $adsLogo = AdsLogo::first();

        $this->currentLogo = $logo ? $logo : null;
        $this->currentAdsLogo = $adsLogo ? $adsLogo : null;
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
        $logo = AdsLogo::findOrFail( $id );
        $logo->delete();

        $this->currentAdsLogo = AdsLogo::first();
    }

    public function render() {
        return view( 'livewire.logo-manage', [
            'currentLogo' => $this->currentLogo,
            'currentAdsLogo' => $this->currentAdsLogo
        ] );
    }
}
