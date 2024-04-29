<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPostPage(Request $request)
    {
        return view('post.newPost');
    }
    public function createPost(Request $request)
    {

        $rules = [
            'title' => 'required|max:255', // Champ "title" requis avec max 255 caractères
            'content' => 'required', // Champ "content" requis
        ];

        // Valider les données du formulaire avec les règles définies
        $validatedData = $request->validate($rules);

        // Créer un nouveau post avec les données validées
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post créé avec succès.');

    }

    public function dashboard(Request $request)
    {
        $userId = Auth::id();

        $posts = Post::where('user_id', $userId)->get();

        return view('dashboard', ['posts' => $posts]);
    }
    public function postShow($id,Request $request)
    {
        $post=post::find($id);
        return view('post.Post', ['post' => $post]);
    }
    public function postDelete($id,Request $request)
    {

        $post=post::find($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post supprimer avec succès.');
    }
    public function updatePostPage($id,Request $request)
    {
        $post=post::find($id);
        if ($post->user_id != Auth::id()) {
            return redirect()->back();
        }

        return view('post.updatePost', ['post' => $post]);

    }

    public function updatePost($id,Request $request)
    {
        $post=post::find($id);

        if ($post->user_id != Auth::id()) {
            return redirect()->back();
        }

        $rules = [
            'title' => 'required|max:255', // Champ "title" requis avec max 255 caractères
            'content' => 'required', // Champ "content" requis
        ];

        $validatedData = $request->validate($rules);

        // Créer un nouveau post avec les données validées
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        return redirect("/dashboard");

    }

}
