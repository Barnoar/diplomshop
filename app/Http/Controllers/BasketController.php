<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

/**
 * @OA\Tag(
 *     name="Basket",
 *     description="Операции с корзиной покупок"
 * )
 */

class BasketController extends Controller
{

/**
 * @OA\Get(
 *     path="/basket",
 *     operationId="basket",
 *     tags={"Basket"},
 *     summary="Получить содержимое корзины",
 *     @OA\Response(response="200", description="Success", @OA\JsonContent()),
 *     security={{"bearerAuth": {}}}
 * )
 */

    public function basket() {
        $orderId = session(key:'orderId');
        // if (!is_null($orderId)) {
        //     $order = Order::findOrFail($orderId);
        // }
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        return view('basket', compact('order'));
    }

/**
 * @OA\Post(
 *     path="/basket/confirm",
 *     operationId="basketConfirm",
 *     tags={"Basket"},
 *     summary="Подтверждение корзины",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="phone", type="string", example="123456789")
 *         )
 *     ),
 *     @OA\Response(response="200", description="Success"),
 *     @OA\Response(response="400", description="Validation Error"),
 *     security={{"bearerAuth": {}}}
 * )
 */

    // Сохранение заказа и перенаправление на главную страницу
    public function basketConfirm(Request $request){
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('body');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success','Ваш заказ принят в обработку');
        } else {
            session()->flash('warning','Произошла ошибка');
        }
        return redirect()->route('body');
    }

    public function basketPlace() {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('app');
        }
        $order = Order::find($orderId);
        return view('order',compact('order'));
    }

/**
 * @OA\Post(
 *     path="/basket/add/{product_id}",
 *     operationId="basketAdd",
 *     tags={"Basket"},
 *     summary="Добавление товара в корзину",
 *     @OA\Parameter(
 *         name="product_id",
 *         in="path",
 *         description="ID товара",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64", example=1)
 *     ),
 *     @OA\Response(response="200", description="Success"),
 *     security={{"bearerAuth": {}}}
 * )
 */

    //Добавление товара в Корзину
    public function basketAdd($product_id) 
    {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($product_id);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($product_id);
        session()->flash('success','Добавлен товар:' . $product->title);

        return redirect()->route('basket');
    }

/**
 * @OA\Delete(
 *     path="/basket/remove/{product_id}",
 *     operationId="basketRemove",
 *     tags={"Basket"},
 *     summary="Удаление товара из корзины",
 *     @OA\Parameter(
 *         name="product_id",
 *         in="path",
 *         description="ID товара",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64", example=1)
 *     ),
 *     @OA\Response(response="200", description="Success"),
 *     security={{"bearerAuth": {}}}
 * )
 */

    //Удаление товара из корзины
    public function basketRemove($product_id)
    {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($product_id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product = Product::find($product_id);
        session()->flash('warning','Удален товар:' . $product->title);

        return redirect()->route('basket');
    }
}
