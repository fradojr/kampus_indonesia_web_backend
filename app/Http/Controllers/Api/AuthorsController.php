<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorsResource;
use App\Models\authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = authors::all();
        return response([
            'data' => AuthorsResource::collection($authors)
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
        $authors = authors::create($request->all());
        return response(['data' => new AuthorsResource($authors), 'message' => 'Author has been created!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = authors::find($id);
        if ($authors != null) {
            return response(['project' => new AuthorsResource($authors), 'message' => 'Retrieved successfully'], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showNameAll()
    {
        $authors = authors::all('name');
        if ($authors != null) {
            return response(['project' => new AuthorsResource($authors)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showName($id)
    {
        $authors = authors::find($id);
        if ($authors != null) {
            return response(['project' => $authors->name], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showPictureAll()
    {
        $authors = authors::all('picture');
        if ($authors != null) {
            return response(['project' => new AuthorsResource($authors)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showPicture($id)
    {
        $authors = authors::find($id);
        if ($authors != null) {
            return response(['project' => $authors->picture], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showAddressAll()
    {
        $authors = authors::all('address');
        if ($authors != null) {
            return response(['project' => new AuthorsResource($authors)], 200);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }

    public function showAddress($id)
    {
        $authors = authors::find($id);
        if ($authors != null) {
            return response(['project' => $authors->address], 200);
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
        $authors = authors::find($id);

        if ($authors != null) {
            $authors->update($request->all());
            return response(['data' => new AuthorsResource($authors), 'message' => 'Author has been updated!'], 202);
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
        $authors = authors::find($id);
        
        if ($authors != null) {
            $authors->delete();
            return response(['message' => 'Authors has been deleted!']);
        } else {
            return response([
                'message' => 'No data found!',
            ], 403);
        }
    }
}
