<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="posts";
    protected $fillable=[
        'id_account',
        'id_type',
        'title',
        'content',
        'picture',
        'address',
        
    ];
}
