<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Get(
 *     path="/admin/categories",
 *     operationId="getAdminCategories",
 *     tags={"Admin"},
 *     summary="Отображение существующих категорий",
 *     description="Get all Categories",
 *     @OA\Response(
 *         response="200",
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Category")
 *         )
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthorized",
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 *
 * @OA\Post(
 *     path="/admin/categories",
 *     operationId="createAdminCategory",
 *     tags={"Admin"},
 *     summary="Создание новой категории",
 *     description="Create a new category",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"title", "img"},
 *                 @OA\Property(
 *                     property="title",
 *                     description="Category title",
 *                     type="string",
 *                     example="Electronics"
 *                 ),
 *                 @OA\Property(
 *                     property="img",
 *                     description="Category image",
 *                     type="file"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Category created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Category")
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthorized",
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->store('categories');
        $params = $request->all();
        $params['img'] = $path;
        Category::create($params);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('auth.categories.form',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Storage::delete($category->img);

        $path = $request->file('img')->store('categories');
        $params = $request->all();
        $params['img'] = $path;

        $category->update($params);
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
