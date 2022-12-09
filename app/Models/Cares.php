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
        'account_id',
        'post_id',
        'stt'
    ];
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }
}
