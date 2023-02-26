<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts', [           
            'title' => 'Halaman Post',
            'active' => 'Post',
            'post' => postingan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [           
            'title' => 'Halaman Create',
            'active' => 'Post',
            'kategori' => kategori::all(),
            'post' => postingan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('gambar')->store('post-images');

        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|file|max:1024',
            'paragraf' => 'required'
        ]);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        };

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');

        postingan::create($validatedData);

        return redirect('/dashboard/posts')->with('succes', 'Postingan anda telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aidi = postingan::find($id);
        return view('dashboard.showpost', [           
            'title' => 'Halaman Post',
            'active' => 'Post',
            'post' => $aidi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aidi = postingan::find($id);
        return view('dashboard.edit', [           
            'title' => 'Halaman Edit',
            'active' => 'Post',
            'post' => $aidi,
            'kategori' => kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|file|max:1024',
            'paragraf' => 'required'
        ]);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        };

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');

        postingan::where('id', $id)->update($validatedData);

        return redirect('/dashboard/posts')->with('edit', 'Postingan anda telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        // if($id->gambar){
        //     Storage::delete($id->gambar);
        // }

        // if($id->gambar){
        //     Storage::delete($id->gambar);
        // }
        postingan::destroy($id);

        return redirect('/dashboard/posts')->with('hapus', 'Postingan anda telah berhasil dihapus');
    }
}
