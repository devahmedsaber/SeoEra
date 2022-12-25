<?php

namespace App\Repositories;

use App\Models\Admin\Product;

class ProductRepository extends Repository
{
    public function __construct(Product $product)
    {
        $this->setModel($product);
    }
}
