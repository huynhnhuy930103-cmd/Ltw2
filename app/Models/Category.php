<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';

    protected $fillable = ['name','slug','parent_id','description','status'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // cấp cha
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // cấp con
    public function children(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
