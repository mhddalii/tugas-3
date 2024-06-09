<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::all();
        return view ('posttampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posttambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
          // Validasi input
          $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Jika validasi lolos, simpan data ke database
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        
        // Jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $post->image = $path;
        }

        $post->save();
        return redirect('post');
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
        $data = Post::find($id);
        return view ('postedit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Temukan post berdasarkan ID
    $data = Post::find($id);

    // Periksa apakah post ditemukan
    if (!$data) {
        return redirect()->back()->with('error', 'Post not found');
    }

    // Update data post berdasarkan data yang telah divalidasi
    $data->title = $validatedData['title'];
    $data->content = $validatedData['content'];

    // Jika ada gambar yang diunggah
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images', $filename, 'public');
        $data->image = $path;
    }

    // Simpan perubahan pada post
    $data->save();
    return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan post berdasarkan ID
        $post = Post::find($id);

        // Periksa apakah post ditemukan
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        // Hapus gambar dari storage jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Hapus post dari database
        $post->delete();

        return redirect('post');
    }
}
