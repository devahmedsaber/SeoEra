<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Services\LanguageService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $productService;
    private LanguageService $languageService;

    public function __construct(ProductService $productService)
    {
        $this->productService  = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->index($request);
        return view('dashboard.products.index', compact('products'));
    }

    public function show($id)
    {
        return $this->productService->show($id);
    }

    public function create(Request $request)
    {
        return $this->productService->create($request);
    }

    public function store(CreateProduct $request)
    {
        return $this->productService->store($request);
    }

    public function edit(Request $request, $id)
    {
        return $this->productService->edit($request, $id);
    }

    public function update(UpdateProduct $request, $id)
    {
        return $this->productService->update($request, $id);
    }

    public function delete($id)
    {
        return $this->productService->delete($id);
    }
}
