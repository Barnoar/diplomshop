<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="ProductAndCategory",
 *     description="Взаимодействие с товаром и категориями"
 * )
 */

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="{cat_alias}/{product_id}",
     *     operationId="getProduct",
     *     tags={"ProductAndCategory"},
     *     summary="Получить товар из базы данных",
     *     @OA\Parameter(
     *         name="cat",
     *         in="path",
     *         description="Category",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="product_id",
     *         in="path",
     *         description="ID of the product",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found")
     * )
     */

    //Логика отображения продукта
    public function show($cat,$product_id) {
        $item = Product::where('id',$product_id)->first();

        return view('product.show',[
            'item' => $item
        ]);
    }

    /**
     * @OA\Get(
     *     path="{cat_alias}",
     *     operationId="getCategory",
     *     tags={"ProductAndCategory"},
     *     summary="Получить категорию из базы данных",
     *     @OA\Parameter(
     *         name="cat_alias",
     *         in="path",
     *         description="Alias of the category",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="Success"),
     *     @OA\Response(response="404", description="Not Found")
     * )
     */

    //Логика отображения категории
    public function showCategory($cat_alias){
        $cat = Category::where('alias',$cat_alias)->first();

        return view('categories.index',[
            'cat' => $cat
        ]);
    }
}
