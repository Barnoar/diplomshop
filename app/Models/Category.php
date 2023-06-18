<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @OA\Schema (
 *     title="Category",
 *     description="Модель категории",
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
 *         example="Category Title"
 *     ),
 *     @OA\Property(
 *         property="desc",
 *         description="Описание",
 *         type="string",
 *         example="Category description"
 *     ),
 *     @OA\Property(
 *         property="alias",
 *         description="Алиас для обращения",
 *         type="string",
 *         example="category-alias"
 *     ),
 *     @OA\Property(
 *         property="img",
 *         description="Image URL",
 *         type="string",
 *         format="url",
 *         example="http://example.com/category-image.jpg"
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
 * Class Category
 *
 * Модель категории.
 *
 * @package App\Models
 * 
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $img
 * @property string $alias
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Category extends Model
{
    /**
     * @OA\Property(
     *    property="products",
     *    description="Сопутствующие товары",
     *    @OA\Schema(
     *        type="array",
     *        @OA\Items(ref="#/components/schemas/Product")
     *    )
     * )
     */

    /**
     * @brief Массовое заполнение атрибутов.
     * 
     * @var array<int, string>
     */
    protected $fillable = ['title','desc','alias','img'];

    use HasFactory;

    /**
     * @brief Получить все товары, принадлежащие категории.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Отношение один ко многим
     * 
     * @see Product
     */

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
