<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';

    protected $fillable = [
        'category_id','brand_id','name','slug',
        'price_buy','price_sale','image','qty',
        'detail','description','status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
