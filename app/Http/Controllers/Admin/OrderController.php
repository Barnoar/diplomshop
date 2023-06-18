<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Admin",
 *     description="Операции выполняемые администратором"
 * )
 */

/**
 * @OA\Schema(
 *     title="Order",
 *     description="Модель заказа",
 *     @OA\Property(
 *         property="id",
 *         description="ID",
 *         type="integer",
 *         format="int64",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Имя",
 *         type="string",
 *         example="Ruslan Farvaev"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="Номер телефона",
 *         type="string",
 *         example="+123456789"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         description="Статус заказа",
 *         type="integer",
 *         format="int32",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         description="Creation date and time",
 *         type="string",
 *         format="date-time"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         description="Last update date and time",
 *         type="string",
 *         format="date-time"
 *     ),
 *     @OA\Property(
 *         property="products",
 *         description="Товары в заказе",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Product")
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/admin/orders",
 *     operationId="getAdminOrders",
 *     tags={"Admin"},
 *     summary="Отображение всех заказов",
 *     @OA\Response(
 *         response="200",
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Order")
 *         )
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Unauthorized",
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status',1)->get();
        return view('auth.orders.index', compact('orders'));
    }
}
