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
        'account_id',
        'type_id',
        'title',
        'content',
        'picture',
        'address',

    ];

    public function user(){
       return $this->belongsTo(Accounts::class, 'account_id', 'id');
    }
}
