<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cares extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="cares";
    protected $fillable=[
        'id_account',
        'id_post',
        'stt'
    ];
    public function post()
    {
        return $this->belongsTo(Posts::class, 'id_post', 'id');
    }
}
