<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
class Product extends Model implements Viewable
{
     use Sluggable,HasFactory;
     use InteractsWithViews;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'category_id',
        'short_text',
        'price',
        'size',
        'color',
        'qty',
        'kdv',
        'status',
        'content',
        'title',
        'description',
        'keywords',
    ];
    public function category() {
      return  $this->hasOne(Category::class,'id','category_id');
    }


    public function images()
    {
        return $this->hasOne(ImageMedia::class,'table_id','id')->where('model_name','Product');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
