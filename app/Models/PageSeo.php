<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $table="page_seos";
    protected $fillable = ['page','dil','page_ust','title','description', 'keywords', 'contents'];


    public function images()
    {
        return $this->hasOne(ImageMedia::class,'table_id','id')->where('model_name','PageSeo');
    }

    public function pageinfo() {
        return $this->hasOne(PageSeo::class,'id','page_ust');
    }

    public function pages() {
        return $this->hasMany(PageSeo::class,'page_ust','id');
    }
}
