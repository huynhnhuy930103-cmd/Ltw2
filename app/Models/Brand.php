<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use SoftDeletes;

    // tên bảng trong DB
    protected $table = 'brand';

    // các cột cho phép insert/update
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status'
    ];

    // quan hệ: 1 brand có nhiều product
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
