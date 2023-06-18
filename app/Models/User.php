<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @OA\Schema (
 *     title="User",
 *     description="Модель пользователя",
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
 *         example="Ruslan"
 *     ),
 *     @OA\Property(
 *         property="surname",
 *         description="Фамилия",
 *         type="string",
 *         example="Farvaev"
 *     ),
 *     @OA\Property(
 *         property="patronymic",
 *         description="Отчество",
 *         type="string",
 *         example="Rinatovich"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         description="Номер телефона",
 *         type="string",
 *         example="+123456789"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="Почта",
 *         type="string",
 *         format="email",
 *         example="user@example.com"
 *     ),
 *     @OA\Property(
 *         property="password",
 *         description="Пароль",
 *         type="string",
 *         format="password"
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
 * Class User
 *
 * Модель пользователя.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Аттрибуты пользователя.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'phone',
        'email',
        'password',
    ];

    /**
     * Скрытые аттрибуты.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Проверяет, является ли пользователь администратором.
     *
     * @return bool
     */
    public function isAdmin()
    {
      return $this->is_admin === 1;  
    }
}
