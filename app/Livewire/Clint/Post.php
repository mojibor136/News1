<?php

namespace App\Livewire\Clint;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Distric;
use App\Models\SubDistric;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Post as PostModel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Pagination;

class Post extends Component {

    use WithFileUploads;

    public $districts;
    public $subdistricts;
    public $sub_categories;
    public $categories;

    public $categoryId;
    public $subcategoryId;
    public $districtsId;
    public $subdistrictsId;
    public $title;
    public $content;
    public $tag;
    public $image;
    public $editPostId;

    public function mount() {
        $this->districts = Distric::all();
        $this->subdistricts = SubDistric::all();
        $this->categories = Category::all();
        $this->sub_categories = SubCategory::all();
    }

    public function CreatePost() {
        $this->validate( [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|max:2400',
            'categoryId' => 'required|exists:categories,id',
            'subcategoryId' => 'required|exists:sub_categories,id',
            'districtsId' => 'required|exists:districs,id',
            'subdistrictsId' => 'required|exists:sub_districs,id',
            'tag' => 'required|string'
        ] );

        if ( auth( 'admin' )->check() ) {
            $authorId = auth( 'admin' )->id();
            $role = auth( 'admin' )->user()->role;
        } elseif ( auth( 'web' )->check() ) {
            $authorId = auth( 'web' )->id();
            $role = auth( 'web' )->user()->role;
        } else {
            $authorId = null;
            $role = null;
        }

        $imageName = $this->image->store( 'uploads', 'public' );

        $tags = array_map( 'trim', explode( ',', $this->tag ) );
        $tagIds = [];

        foreach ( $tags as $tag ) {
            $tagModel = Tag::firstOrCreate( [ 'tag' => $tag ] );
            $tagIds[] = $tagModel->id;
        }

        $post = PostModel::create( [
            'title' => $this->title,
            'description' => $this->content,
            'category_id' => $this->categoryId,
            'subcategory_id' => $this->subcategoryId,
            'district_id' => $this->districtsId,
            'subdistrict_id' => $this->subdistrictsId,
            'author_id' => $authorId,
            'role' => $role,
            'status' => 'pending',
            'slug' => Str::slug( $this->title ),
            'image' => $imageName,
        ] );

        $post->tags()->sync( $tagIds );

        session()->flash( 'message', 'Post created successfully!' );
        $this->reset(
            'title',
            'content',
            'categoryId',
            'subcategoryId',
            'districtsId',
            'subdistrictsId',
            'tag',
            'image',
        );
    }

    public function deletePost( $id ) {
        PostModel::findOrFail( $id )->delete();
        session()->flash( 'message', 'Post deleted successfully!' );
    }

    public function editPost( $id ) {
        $post = PostModel::find( $id );
        $this->editPostId = $post->id;
        $this->title = $post->title;
        $this->categoryId = $post->category_id;
        $this->subcategoryId = $post->subcategory_id;
        $this->districtsId = $post->district_id;
        $this->subdistrictsId = $post->subdistrict_id;
        $this->content = $post->description;
        $this->tag = implode( ',', $post->tags->pluck( 'tag' )->toArray() );
    }

    public function updatePost() {
        $this->validate( [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'categoryId' => 'required|exists:categories,id',
            'subcategoryId' => 'required|exists:sub_categories,id',
            'districtsId' => 'required|exists:districs,id',
            'subdistrictsId' => 'required|exists:sub_districs,id',
            'tag' => 'required|string'
        ] );

        $post = PostModel::find( $this->editPostId );

        if ( $this->image ) {
            $imageName = $this->image->store( 'uploads', 'public' );
            $post->image = $imageName;
        }

        $tags = array_map( 'trim', explode( ',', $this->tag ) );
        $tagIds = [];
        foreach ( $tags as $tag ) {
            $tagModel = Tag::firstOrCreate( [ 'tag' => $tag ] );
            $tagIds[] = $tagModel->id;
        }

        $post->update( [
            'title' => $this->title,
            'description' => $this->content,
            'category_id' => $this->categoryId,
            'subcategory_id' => $this->subcategoryId,
            'district_id' => $this->districtsId,
            'subdistrict_id' => $this->subdistrictsId,
            'slug' => Str::slug( $this->title ),
        ] );

        $post->tags()->sync( $tagIds );

        session()->flash( 'message', 'Post updated successfully!' );
        $this->reset(
            'title',
            'content',
            'categoryId',
            'subcategoryId',
            'districtsId',
            'subdistrictsId',
            'tag',
            'image',
        );
    }

    public function render() {
        $authId = Auth::id();
        $posts = PostModel::where( 'author_id', $authId )->where( 'role', 'user' )->paginate( 6 );
        return view( 'livewire.clint.post', [ 'posts' => $posts ] );
    }
}
