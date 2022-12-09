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
    public function user(){
        return $this->belongsTo(Accounts::class, 'id_account', 'id');
    }

    public function userRep(){
        return $this->belongsTo(Accounts::class, 'id_account_rep', 'id');
     }
}
