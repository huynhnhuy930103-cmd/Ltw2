<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = 'post';


    protected $fillable = [
        'topic_id',
        'title',
        'slug',
        'detail',
        'image',
        'post_type',
        'description',
        'created_by',
        'updated_by',
        'status'
    ];
}
