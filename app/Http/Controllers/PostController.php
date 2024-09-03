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
        return view('akun.create');
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
            'username'     => 'required|min:5',
            'password'     => 'required|min:5',
            'name'   => 'required|min:5',
            'role'   => 'required'
        ]);

        //create post
        Account::create([
            'username'     => $request->username,
            'password'   => $request->password,
            'name'   => $request->name,
            'role'   => $request->role
        ]);

        //redirect to index
        return redirect()->route('account.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $account = Account::where('username', $id)->first();

        //render view with post
        return view('akun.show', compact('account'));
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
        $account = Account::findOrFail($id);

        //render view with post
        return view('akun.edit', compact('account'));
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
            'username'     => 'required|min:5',
            'password'     => 'required|min:5',
            'name'   => 'required|min:5',
            'role'   => 'required'
        ]);

        //get post by ID
        $account = Account::findOrFail($id);

        //update post without image
        $account->update([
            'username'     => $request->username,
            'password'   => $request->password,
            'name'   => $request->name,
            'role'   => $request->role
        ]);

        //redirect to index
        return redirect()->route('account.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $account = Account::findOrFail($id);

        //delete post
        $account->delete();

        //redirect to index
        return redirect()->route('account.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
