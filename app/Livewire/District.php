<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Distric as DistrictModels;
use App\Models\SubDistric;
use Livewire\Pagination;

class District extends Component {

    public $district, $district_id;

    public function CreateDistrict() {

        $this->validate( [
            'district' => 'required|unique:categories,name',
        ] );

        DistrictModels::create( [
            'name' => $this->district,
        ] );

        session()->flash( 'message', 'District created successfully.' );
        $this->reset( 'district' );
    }

    public function deleteDistrict( $districtId ) {
        $district = DistrictModels::findOrFail( $districtId );

        $district->subDistricts()->delete();
        $district->posts()->delete();
        $district->delete();

        session()->flash( 'message', 'District and its subdistricts deleted successfully!' );
    }

    public function editDistrict( $id ) {
        $district = DistrictModels::findOrFail( $id );
        $this->district_id = $district->id;
        $this->district = $district->name;
    }

    public function updateDistrict() {
        $this->validate( [
            'district' => 'required|string|max:255',
        ] );

        $district = DistrictModels::findOrFail( $this->district_id );
        $district->update( [
            'name' => $this->district,
        ] );

        session()->flash( 'message', 'District updated successfully.' );

        $this->reset( 'district' );
    }

    public function render() {
        $districts = DistrictModels::paginate( 10 );
        return view( 'livewire.district', [ 'districts' => $districts ] );
    }
}
