<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Pagination;
use App\Models\Category;
use App\Models\SubCategory as SubCategoryModel;

class SubCategory extends Component {

    public $name, $category_id, $subcategory_id, $categories;

    public function mount() {
        $this->categories = Category::all();
    }

    public function saveSubCategory() {
        $this->validate( [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
        ] );

        SubCategoryModel::create( [
            'category_id' => $this->category_id,
            'name' => $this->name,
        ] );

        session()->flash( 'message', 'SubCategory created successfully!' );
        $this->reset( 'name' );
    }

    public function deleteSubCategory( $id ) {
        $subCategory = SubCategoryModel::find( $id );

        $subCategory->posts()->delete();
        $subCategory->delete();

        session()->flash( 'message', 'Sub-category and related posts deleted successfully!' );
    }

    public function editSubCategory( $id ) {
        $subcategory = SubCategoryModel::findOrFail( $id );
        $this->subcategory_id = $subcategory->id;
        $this->name = $subcategory->name;
        $this->category_id = $subcategory->category_id;
    }

    public function updateSubCategory() {
        $this->validate( [
            'name' => 'required',
            'category_id' => 'required',
        ] );

        $subcategory = SubCategoryModel::findOrFail( $this->subcategory_id );
        $subcategory->name = $this->name;
        $subcategory->category_id = $this->category_id;
        $subcategory->save();

        session()->flash( 'message', 'SubCategory updated successfully.' );

        $this->reset( 'category_id' );
        $this->reset( 'name' );
    }

    public function render() {
        $sub_categories = SubCategoryModel::with( 'category' )->paginate( 10 );
        return view( 'livewire.sub-category', compact( 'sub_categories' ) );
    }
}
