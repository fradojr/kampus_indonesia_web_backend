<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::all();
        return response([
            'data' => NewsResource::collection($news)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = news::create($request->all());
        return response(['data' => new NewsResource($news), 'message' => 'News has been created!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = news::find($id);
        if ($news != null) {
            return response(['project' => new NewsResource($news), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showTitleAll()
    {
        $news = news::all('title');
        if ($news != null) {
            return response(['project' => new NewsResource($news)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showTitle($id)
    {
        $news = news::find($id);
        if ($news != null) {
            return response(['project' => $news->title], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showContentAll()
    {
        $news = news::all('content');
        if ($news != null) {
            return response(['project' => new NewsResource($news)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showContent($id)
    {
        $news = news::find($id);
        if ($news != null) {
            return response(['project' => $news->content], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showPictureAll()
    {
        $news = news::all('picture');
        if ($news != null) {
            return response(['project' => new NewsResource($news)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showPicture($id)
    {
        $news = news::find($id);
        if ($news != null) {
            return response(['project' => $news->picture], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
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
        $news = news::find($id);

        if ($news != null) {
            $news->update($request->all());
            return response(['data' => new NewsResource($news), 'message' => 'News has been updated!'], 202);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);
        
        if ($news != null) {
            $news->delete();
            return response(['message' => 'News has been deleted!']);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }
}
