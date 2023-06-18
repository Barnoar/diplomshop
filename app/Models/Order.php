<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @OA\Schema (
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
 * Class Order
 *
 * Модель заказа.
 *
 * @package App\Models
 * 
 * @property int $id
 * @property int $status
 * @property string|null $name
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @mixin \Eloquent
 */

class Order extends Model
{
    use HasFactory;
    /**
     * Получить товары, относящиеся к заказу.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Отношение многие ко многим
     *
     * @see Product
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('count')->withTimestamps();
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    /**
     * Получить полную стоимость заказа.
     *
     * @return float Стоимость заказа
     */
    
    public function getFullPrice()
    {   
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    /**
     * Сохранить информацию о заказе.
     *
     * @param string $name Имя заказчика
     * @param string $phone Телефон заказчика
     * @return bool Возвращает true, если сохранение успешно, иначе false
     */

    public function saveOrder($name, $phone){
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
        
    }
}
