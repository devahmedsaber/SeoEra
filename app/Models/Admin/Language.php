<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = ['title', 'img', 'slogan', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
