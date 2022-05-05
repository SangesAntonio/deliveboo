<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'DESC')->with(['users'])->get();
        return response()->json($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->with(['users'])->first();
        if (!$category) return response('category Not Found', 404);
        return response()->json($category);
    }
}