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
        'post_id',
        'account_id',
        'content',
        'account_rep_id'
    ];
    public function user(){
        return $this->belongsTo(Accounts::class, 'account_id', 'id');
    }

    public function userRep(){
        return $this->belongsTo(Accounts::class, 'account_rep_id', 'id');
     }
}
