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
    public $subtitle;
    public $imgTitle;
    public $reporter;
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
            'reporter' => 'required',
            'subtitle' => 'required',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|max:2400',
            'categoryId' => 'required|exists:categories,id',
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
            'reporter' => $this->reporter,
            'imgTitle' => $this->imgTitle,
            'subtitle' => $this->subtitle,
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
            'subtitle',
            'reporter',
            'imgTitle',
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
        $this->reporter = $post->reporter;
        $this->imgTitle = $post->imgTitle;
        $this->editPostId = $post->id;
        $this->subtitle = $post->subtitle;
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
            'subtitle' => 'nullable',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'categoryId' => 'nullable|exists:categories,id',
            'subcategoryId' => 'nullable|exists:sub_categories,id',
            'districtsId' => 'nullable|exists:districs,id',
            'subdistrictsId' => 'nullable|exists:sub_districs,id',
            'tag' => 'nullable|string'
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
            'subtitle' => $this->subtitle,
            'reporter' => $this->reporter,
            'imgTitle' => $this->imgTitle,
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
            'subtitle',
            'reporter',
            'imgTitle',
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
