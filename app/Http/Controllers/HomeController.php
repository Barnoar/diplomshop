<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index1()
    {
        $products = Product::orderBy('created_at')->take(50)->get();
        
        return view('body',[
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        // $s = $request->s;
        // $products = Product::where('title', 'LIKE', "%{$s}%")->orWhere('category_id', 'LIKE', "%{$s}%")->get();
        $s = $request->s;
        $products = Product::where(function ($query) use ($s) {
        $query->where('title', 'LIKE', "%{$s}%")
            ->orWhereHas('category', function ($query) use ($s) {
                $query->where('title', 'LIKE', "%{$s}%");
            });
        })->get();


        return view('body', [
            'products' => $products
        ]);
    }
}
