<?php

namespace App\Services;

use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Admin\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    private ProductRepository $productRepository;
    private LanguageService $languageService;

    public function __construct(ProductRepository $productRepository, LanguageService $languageService)
    {
        $this->productRepository = $productRepository;
        $this->languageService   = $languageService;
    }

    public function index(Request $request)
    {
        return $this->productRepository->all();
    }

    public function show($id)
    {
        return $this->productRepository->find($id);
    }

    public function create(Request $request)
    {
        $languages = $this->languageService->index($request);
        return view('dashboard.products.create', compact('languages'));
    }

    public function store(CreateProduct $request)
    {
        if (isset($request['img']) && !is_null($request['img']) && $request->hasFile('img')){
            $image = uploadImage($request['img'], 'products_images');
        }

        $product = Product::create([
            'name'        => $request['name'],
            'description' => $request['description'] ?? null,
            'img'         => $image['image_path'] ?? null,
            'price'       => $request['price'],
            'language_id' => $request['language_id'],
        ]);

        return redirect()->route('admin.products.index');
    }

    public function edit(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
        $languages = $this->languageService->index($request);
        return view('dashboard.products.edit', compact('product', 'languages'));
    }

    public function update(UpdateProduct $request, int $id)
    {
        $product = Product::find($id);

        if (!$product){
            return redirect()->back()->with('error', 'Product Not Found');
        }

        if (isset($request['img']) && !is_null($request['img']) && $request->hasFile('img')){
            if (!is_null($product->img) && file_exists(public_path($product->img))){
                unlink($product->img);
            }
            $image = uploadImage($request['img'], 'products_images');
        }

        $product->update([
            'name'        => $request['name'] ?? $product->name,
            'description' => $request['description'] ?? $product->description,
            'img'         => $image['image_path'] ?? $product->img,
            'price'       => $request['price'] ?? $product->price,
            'language_id' => $request['language_id'] ?? $product->language_id,
        ]);

        return redirect()->route('admin.products.index');
    }

    public function delete(int $id)
    {
        $product = Product::find($id);

        if (!$product){
            return redirect()->back()->with('error', 'Product Not Found');
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product Deleted');
    }
}
