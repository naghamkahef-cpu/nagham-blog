<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('user')->latest()->paginate(10);
        return view('posts',compact('posts'));
    }
    public function create(){
       
        return view('create');
    }
    public function storePost(Request $request){
         $request->validate([
            'title'=>'required',
            'description'=>'required',
         ]);
         $imagePath = null;

        // ✅ الملف اسمه image (من الفورم)
        if (request()->hasFile('image')) {
            request()->validate([
                'image' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ]);

            $imagePath = request()->file('image')->store('posts', 'public');
        }
        
        Post::create(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                 // ✅ اسم العمود بالداتا بيز
                'image_path' => $imagePath,
                'user_id' => Auth::id(),
            ]
            );
            return redirect()->route('posts')->with('success', 'Post created!');
        
     
    }
    public function show($postid)
{
    $post = Post::with('user')->findOrFail($postid);
    return view('show', compact('post'));
}
    
}
