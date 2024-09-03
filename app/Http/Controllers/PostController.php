<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('post.index', compact('posts'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        //validate form
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'     => 'required|min:5',
            'date'   => 'required',
            'username'   => 'required'
        ]);

        //create post
        Post::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'date'   => $request->date,
            'username'   => $request->username
        ]);

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::where('username', $id)->first();

        //render view with post
        return view('post.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('post.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'title'     => 'required|min:5',
            'content'     => 'required|min:5',
            'date'   => 'required',
            'username'   => 'required'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //update post without image
        $post->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'date'   => $request->date,
            'username'   => $request->username
        ]);

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
