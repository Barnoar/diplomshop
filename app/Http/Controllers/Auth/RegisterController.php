<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Authentication",
 *     description="Регистрация и авторизация пользователя"
 * )
 */

/**
 * @OA\Post(
 *     path="/register",
 *     operationId="registerUser",
 *     tags={"Authentication"},
 *     summary="Регистрация нового пользователя",
 *     @OA\RequestBody(
 *         description="Данные для регистрации",
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Ruslan"),
 *             @OA\Property(property="surname", type="string", example="Farvaev"),
 *             @OA\Property(property="patronymic", type="string", example="Rinatovich"),
 *             @OA\Property(property="phone", type="string", example="+79990011222"),
 *             @OA\Property(property="email", type="string", format="email", example="Ruslan@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password"),
 *             @OA\Property(property="Confirm password", type="string", format="password", example="password")
 *         )
 *     ),
 *     @OA\Response(response="200", description="Успешная регистрация"),
 *     @OA\Response(response="400", description="Ошибка валидации")
 * )
 */

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected function redirectTo(){
        return route('body');
    }
    // /**
    //  * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],

            'surname' => $data['surname'],
            'patronymic' => $data['patronymic'],
            'phone' => $data['phone'],

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
