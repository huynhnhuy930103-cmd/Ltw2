<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'menu';

    protected $fillable = [
        'name',
        'link',
        'position',
        'table_id',
        'parent_id',
        'type',
        'sort_order',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'parent_id' => 'integer',
        'table_id' => 'integer',
        'status' => 'integer',
    ];
}
