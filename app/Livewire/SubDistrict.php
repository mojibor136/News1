<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Distric;
use App\Models\SubDistric;
use Livewire\Pagination;

class SubDistrict extends Component {

    public $name, $district_id, $subdistrict_id, $districts;

    public function mount() {
        $this->districts = Distric::all();
    }

    public function saveSubDistric() {
        $this->validate( [
            'district_id' => 'required',
            'name' => 'required|string|max:255',
        ] );

        SubDistric::create( [
            'district_id' => $this->district_id,
            'name' => $this->name,
        ] );

        session()->flash( 'message', 'SubDistric created successfully!' );
        $this->reset( 'district_id' );
        $this->reset( 'name' );
    }

    public function deleteSubdistrict( $id ) {
        $subdistrict = SubDistric::findOrFail( $id );

        $subdistrict->posts()->delete();
        $subdistrict->delete();

        session()->flash( 'message', 'Sub-district deleted successfully!' );
    }

    public function editSubDistrict( $id ) {
        $subdistrict = SubDistric::findOrFail( $id );
        $this->subdistrict_id = $subdistrict->id;
        $this->name = $subdistrict->name;
        $this->district_id = $subdistrict->district_id;
    }

    public function updateSubDistrict() {
        $this->validate( [
            'name' => 'required|string|max:255',
            'district_id' => 'required|exists:districs,id',
        ] );

        $subdistrict = SubDistric::findOrFail( $this->subdistrict_id );
        $subdistrict->update( [
            'name' => $this->name,
            'district_id' => $this->district_id,
        ] );

        session()->flash( 'message', 'Sub-district updated successfully.' );

        $this->reset( 'district_id' );
        $this->reset( 'name' );
    }

    public function render() {
        $sub_districts = SubDistric::with( 'district' )->paginate( 6 );
        return view( 'livewire.sub-district', [ 'sub_districts' => $sub_districts ] );
    }
}
