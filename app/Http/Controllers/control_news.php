<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class control_news extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = news::all();
        return view('admin.news', compact('berita'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        news::create([
            'title' => $request->title,
            'picture' => $request->picture,
            'content' => $request->content,
            'is_published' => $request->is_published
        ]);
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function load_image($name_file)
    {
        $gambar = array(
            'gambar' => $name_file
        );
        return view('image_news', $gambar);
        //echo 'hei';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = news::findOrFail($id);
        return view('admin.edit_news', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        news::findOrFail($id)->update([
            'title' => $request->title,
            'picture' => $request->picture,
            'content' => $request->content,
            'is_published' => $request->is_published
        ]);

        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        news::findOrFail($id)->delete();
        return redirect('news');
    }
}
