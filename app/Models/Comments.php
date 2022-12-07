<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="comments";
    protected $fillable=[
        'id_post',
        'id_account',
        'content',
        'id_account_rep'
    ];
}
