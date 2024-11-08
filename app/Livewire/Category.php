<?php
namespace App\Livewire;

use App\Models\Category as CategoryModel;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Pagination;
use App\Models\SubCategory;

class Category extends Component {

    public $category;
    public $successMessage = '';
    public $categoryId;

    public function CreateCategory() {
        $this->validate( [
            'category' => 'required|unique:categories,name',
        ], [
            'category.unique' => 'This category name already exists. Please choose a different name.',  // কাস্টম মেসেজ
        ] );

        CategoryModel::create( [
            'name' => $this->category,
            'slug' => Str::slug( $this->category ),
        ] );

        session()->flash( 'message', 'Category created successfully!' );
        $this->reset( 'category' );

        $this->dispatch( 'categorySaved' );

    }

    public function updateOrder( $orderedIds ) {
        foreach ( $orderedIds as $index => $id ) {
            Category::where( 'id', $id )->update( [ 'position' => $index ] );
        }
        session()->flash( 'message', 'Category order updated successfully.' );
    }

    public function deleteCategory( $id ) {
        $category = CategoryModel::find( $id );

        $category->subCategories()->delete();
        $category->posts()->delete();
        $category->delete();

        session()->flash( 'message', 'Category deleted successfully!' );
    }

    public function editCategory( $id ) {
        $category = CategoryModel::findOrFail( $id );
        $this->categoryId = $category->id;
        $this->category = $category->name;
    }

    public function updateCategory() {
        $this->validate( [
            'category' => 'required|string|max:255',
        ] );

        $category = CategoryModel::findOrFail( $this->categoryId );
        $category->update( [
            'name' => $this->category,
        ] );

        session()->flash( 'message', 'Category updated successfully!' );
        $this->reset( 'category' );

        $this->dispatch( 'categoryUpdated' );
    }

    public function render() {
        $categories = CategoryModel::paginate( 10 );
        return view( 'livewire.category', [ 'categories' => $categories ] );
    }
}
