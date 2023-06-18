<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * @OA\Tag(
 *     name="Authentication",
 *     description="Регистрация и авторизация пользователя"
 * )
 */

class LoginController extends Controller
{
    /**
 * @OA\Post(
 *     path="/login",
 *     operationId="loginUser",
 *     tags={"Authentication"},
 *     summary="Авторизация пользователя",
 *     @OA\RequestBody(
 *         description="Данные для авторизации",
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Успешная авторизация",
 *         @OA\JsonContent(
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password")
 *         )
 *     ),
 *     @OA\Response(
 *         response="401",
 *         description="Ошибка авторизации",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Неверные учетные данные")
 *         )
 *     )
 * )
 */
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function redirectTo(){
        return route('body');
    }
    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }
}
