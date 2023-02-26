<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepostinganRequest;
use App\Http\Requests\UpdatepostinganRequest;
use App\Models\kategori;
use App\Models\postingan;
use App\Models\User;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('kategori')) {
            $kategori = kategori::firstWhere('slug', request('kategori'));
            $title = 'di ' . $kategori->slug;
        }

        if (request('author')) {
            $author = User::firstWhere('name', request('author'));
            $title = 'oleh ' . $author->name;
        }

        return view('postingan', [
            'active' => 'Postingan',
            "title" => "Semua Postingan $title",
            "post" => postingan::latest()->filter(request(['search', 'kategori', 'author']))->paginate(7)->withQueryString()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostinganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostinganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('tampilan-post', [
            'title' => 'Satu Post', 
            "postbaru" => postingan::find($id),
            'active' => 'Postingan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function edit(postingan $postingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostinganRequest  $request
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepostinganRequest $request, postingan $postingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postingan  $postingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(postingan $postingan)
    {
        //
    }
}
