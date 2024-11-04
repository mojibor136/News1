<?php

namespace App\Http\Controllers\Clint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Distric;
use App\Models\SubDistric;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class ClintPostController extends Controller {
    public function Index() {
        $authId = Auth::id();
        $posts = Post::where( 'author_id', $authId )->where( 'role', 'user' )->paginate( 10 );
        return view( 'clint.all-post', compact( 'posts' ) );
    }

    public function AddPost() {
        $districts = Distric::all();
        $subdistricts = SubDistric::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view( 'clint.add-post', compact( 'districts', 'subdistricts', 'categories', 'sub_categories' ) );
    }

    public function StorePost( Request $request ) {
        $validatedData = $request->validate( [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'imgTitle' => 'required|string|max:255',
            'reporter' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'categoryId' => 'required|exists:categories,id',
            'tag' => 'nullable|string|max:255',
            'lead' => 'required|in:yes,no',
            'content' => 'required|string',
        ], [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
            'title.required' => 'The title is required.',
            'lead.required' => 'Lead news selection is required.',
            'lead.in' => 'Please select a valid option for lead news.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'imgTitle.required' => 'The image title is required.',
            'imgTitle.max' => 'The image title may not be greater than 255 characters.',
            'reporter.required' => 'The reporter name is required.',
            'reporter.max' => 'The reporter name may not be greater than 255 characters.',
            'subtitle.max' => 'The subtitle may not be greater than 255 characters.',
            'categoryId.required' => 'You must select a category.',
            'tag.max' => 'The tag may not be greater than 255 characters.',
            'content.required' => 'Content cannot be empty.',
        ] );

        // Authenticated admin user information
        $role = 'user';
        $clintUser = Auth::guard( 'web' )->user();
        $authorName = $clintUser->name;
        $authorId = $clintUser->id;

        // Store the uploaded image
        $imageName = $request->file( 'image' )->store( 'uploads', 'public' );

        // Process tags
        $tags = array_map( 'trim', explode( ',', $validatedData[ 'tag' ] ) );
        $tagIds = [];

        foreach ( $tags as $tag ) {
            $tagModel = Tag::firstOrCreate( [ 'tag' => $tag ] );
            $tagIds[] = $tagModel->id;
        }

        // Create the post
        $post = Post::create( [
            'reporter' => $request->reporter,
            'imgTitle' => $request->imgTitle,
            'subtitle' => $request->subtitle,
            'title' => $request->title,
            'lead' => $request->lead,
            'description' => $request->content,
            'category_id' => $request->categoryId,
            'subcategory_id' => $request->subcategoryId,
            'district_id' => $request->districtsId,
            'subdistrict_id' => $request->subdistrictsId,
            'author_name' => $authorName,
            'author_id' => $authorId,
            'role' => $role,
            'status' => 'pending',
            'slug' => Str::slug( $request->title ),
            'image' => $imageName,
        ] );

        // Sync tags with the post
        $post->tags()->sync( $tagIds );

        // Redirect or return response as needed
        return redirect()->route( 'clint.all.post' )->with( 'success', 'Post created successfully!' );
    }

    public function DeletePost( $id ) {
        Post::findOrFail( $id )->delete();

        return redirect()->route( 'clint.all.post' )->with( 'success', 'Post deleted successfully!' );
    }

    public function EditPost( $id ) {
        $posts = Post::findOrFail( $id );
        $districts = Distric::all();
        $subdistricts = SubDistric::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view( 'clint.edit.edit-post', compact( 'districts', 'subdistricts', 'categories', 'sub_categories', 'posts' ) );
    }

    public function UpdatePost( Request $request ) {
        // Retrieve the existing post
        $post = Post::findOrFail( $request->id );

        // Update the post's properties with data from the request
    $post->title = $request->title;
    $post->imgTitle = $request->imgTitle;
    $post->subtitle = $request->subtitle;
    $post->description = $request->content;
    $post->category_id = $request->categoryId;
    $post->lead  = $request->lead;
    $post->subcategory_id = $request->subcategoryId;
    $post->district_id = $request->districtsId;
    $post->subdistrict_id = $request->subdistrictsId;
    $post->slug = Str::slug($request->title);
    
    // Handle the image if provided
    if ($request->hasFile('image')) {
        // Store the image and assign the name to the post
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->image = $imageName;
    }

    // Handle tag processing if tags are provided
    if ($request->filled('tag')) {
        $tags = array_map('trim', explode(', ', $request->tag));
        $tagIds = [];

        foreach ($tags as $tag) {
            $tagModel = Tag::firstOrCreate(['tag' => $tag]);
            $tagIds[] = $tagModel->id; // Store the IDs of the tags
        }
        
        // Sync the tags with the post
        $post->tags()->sync($tagIds);
    }

    // Save the updated post
    $post->save();

    // Redirect back with a success message
    return redirect()->route('clint.all.post')->with('success', 'Post updated successfully!' );
    }

    public function ViewPost( $id ) {
        $posts = Post::findOrFail( $id );
        return view('clint.post-view',compact('posts' ) );
    }
}
