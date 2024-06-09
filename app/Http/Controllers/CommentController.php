<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return view ('commenttampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commenttambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->name = $validatedData['name'];
        $comment->content = $validatedData['content'];

        $comment->save();
        return redirect('comment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Comment::find($id);
        return view ('commentedit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $data = Comment::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Comment not found');
        }

        $data->name = $validatedData['name'];
        $data->content = $validatedData['content'];
        $data->save();
        return redirect('comment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        // Periksa apakah post ditemukan
        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found');
        }

        $comment->delete();

        return redirect('comment');
    }
}
