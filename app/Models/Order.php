<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no','product_id','name','price','qty','kdv'];


    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
    }

}
