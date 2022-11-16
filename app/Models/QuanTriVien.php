<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTriVien extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table="accounts";
    protected $fillable=[
        'username',
        'pass',
        'permission',
        'fullname',
        'sex',
        'phone',
        'birhday',
        'address'
    ];
    public function getPasswordAttribute(){
        return $this->pass;
    }
}
