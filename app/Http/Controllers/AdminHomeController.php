<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('languages', 'products.language_id', '=', 'languages.id')
            ->selectRaw('
                products.id as id,
                products.name as name,
                products.description as description,
                products.img as img,
                products.price as price,
                languages.title as lang_title
            ')
            ->get();

        return view('dashboard.index', compact('products'));
    }
}
