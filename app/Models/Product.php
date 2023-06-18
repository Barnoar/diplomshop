<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @OA\Schema (
 *     title="Product",
 *     description="Модель товара",
 *     @OA\Property(
 *         property="id",
 *         description="ID",
 *         type="integer",
 *         format="int64",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="title",
 *         description="Название",
 *         type="string",
 *         example="Product Title"
 *     ),
 *     @OA\Property(
 *         property="price",
 *         description="Цена",
 *         type="number",
 *         format="float",
 *         example=100
 *     ),
 *     @OA\Property(
 *         property="new_price",
 *         description="Новая цена, если имеется",
 *         type="number",
 *         format="float",
 *         example=90
 *     ),
 *     @OA\Property(
 *         property="in_stock",
 *         description="В наличии(1), не в наличии(0)",
 *         type="boolean",
 *         example=true
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         description="ID соответствующей категории",
 *         type="integer",
 *         format="int64",
 *         example=1
 *     ),
 *     @OA\Property(
 *         property="description",
 *         description="Описание товара",
 *         type="string",
 *         example="Product description"
 *     ),
 *     @OA\Property(
 *         property="img",
 *         description="Image URL",
 *         type="string",
 *         format="url",
 *         example="http://example.com/product-image.jpg"
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
 *     )
 * )
 */

 /**
 * Class Product
 *
 * Модель товара.
 *
 * @details Модель товара содержит информацию о названии товара, его цене, наличии на складе, категории, описании и изображении.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property int $in_stock
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $new_price
 * @property int $category_id
 * @property string $img
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImage> $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNewPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Product extends Model
{
    /**
     * @brief Массовое заполнение атрибутов.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'price', 'in_stock', 'category_id', 'description', 'new_price','img'];

    use HasFactory;
    /**
     * @brief Получить все изображения товара.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Отношение один ко многим
     *
     * @see ProductImage
     */
    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * @OA\Property(
     *    property="category",
     *    description="Продукт пренадлежащий категории",
     *    ref="#/components/schemas/Category"
     * )
     */

     /**
     * @brief Получить категорию, к которой принадлежит товар.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Отношение один к одному
     *
     * @see Category
     *
     * @note Поле foreign key по умолчанию считается category_id
     */
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @brief Получить общую цену товаров.
     *
     * @details Метод получает общую цену товаров, учитывая их количество.
     *
     * @return float Цена
     */
    public function getPriceForCount() {
        if(!is_null($this->pivot)) {
            return $this->pivot->count * $this->new_price;
        }
        return $this->new_price;
    }
        //подключение к серверу с нейронной сетью
    public function getDescription() {
        $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $result = socket_connect($sock, "127.0.0.1", 9876);
        // if ($result) { return "$result";} else {return "$result";}
        $bdata = "Опиши $this->title в 20 словах\n";
        $sent_bytes = socket_send($sock,$bdata,strlen($bdata),MSG_EOF);
        // if ($result) { return "$sent_bytes";} else {return "$sent_bytes";}

        socket_shutdown ($sock,1);
        $hz = "";
        socket_set_option($sock, SOL_SOCKET, SO_RCVTIMEO, array("sec"=>1000, "usec"=>0));
        while (true) {
            $out = socket_read($sock, 2048);
            if (str_contains($out, ">")) {
                trim($out, ">");
                $hz = $hz . trim($out, ">");
                break;
            } else {
                $hz = $hz .$out;
            }
        }
        socket_close($sock);
        return $hz;
    }
}
