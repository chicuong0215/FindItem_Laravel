<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiDang extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="posts";
    protected $fillable=[
        'id',
        'id_post',
        'id_account',
        'id_type',
        'id_object',
        'title',
        'content',
        'picture',
        'address',
        
    ];
}
