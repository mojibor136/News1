<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Distric;
use App\Models\SubDistric;

class DistrictSubdistrictFilter extends Component  {
    public $districts = [];
    public $subdistricts = [];
    public $selectedDistrict = null;
    public $selectedSubdistrict = null;

    public function mount()  {
        $this->districts = Distric::all();
    }

    public function updatedSelectedDistrict( $districtId )  {
        dd($districtId);
        $this->subdistricts = SubDistric::where( 'district_id', $districtId )->get();
        $this->selectedSubdistrict = null;

    }

    public function render()  {
        return view( 'livewire.district-subdistrict-filter' );
    }
}
