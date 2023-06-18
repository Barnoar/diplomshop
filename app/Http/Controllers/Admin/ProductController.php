<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Get(
 *     path="/admin/products",
 *     operationId="getAdminProducts",
 *     tags={"Admin"},
 *     summary="Отображение существующих товаров",
 *     description="Get all products",
 *     @OA\Response(
 *         response="200",
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Product")
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
 *     path="/admin/products",
 *     operationId="createAdminProduct",
 *     tags={"Admin"},
 *     summary="Создание нового товара",
 *     description="Creates a new product",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             required={"title", "price", "in_stock", "category_id", "description", "new_price", "img"},
 *             @OA\Property(
 *                 property="title",
 *                 description="Название продукта",
 *                 type="string",
 *                 example="Guitar"
 *             ),
 *             @OA\Property(
 *                 property="price",
 *                 description="Цена товара",
 *                 type="number",
 *                 example="500"
 *             ),
 *             @OA\Property(
 *                 property="in_stock",
 *                 description="Наличие товара",
 *                 type="boolean",
 *                 example=true
 *             ),
 *             @OA\Property(
 *                 property="category_id",
 *                 description="ID Принадлежащей категории",
 *                 type="integer",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="description",
 *                 description="Описание товара",
 *                 type="string",
 *                 example="Exammple desc"
 *             ),
 *             @OA\Property(
 *                 property="new_price",
 *                 description="Новая цена товара",
 *                 type="number",
 *                 example="200"
 *             ),
 *             @OA\Property(
 *                 property="img",
 *                 description="Фото товара",
 *                 type="file"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Product created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthorized",
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('auth.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img')->store('products');
        $params = $request->all();
        $params['img'] = $path;
        Product::create($params);
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('auth.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('auth.products.form', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Storage::delete($product->img);
        $path = $request->file('img')->store('products');
        $params = $request->all();
        $params['img'] = $path;
        $product->update($params);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
