<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'img', 'price', 'language_id', 'created_at', 'updated_at'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
