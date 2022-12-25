<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';

    public function shop()
    {
        return $this->hasOne(Shop::class, 'seller_id');
    }
}
