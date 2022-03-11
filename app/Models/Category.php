<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable=['category','category_image'];

     public static function category()
    {
        $sub=Category::with('submenues')->get();
        $sub=json_decode(json_encode($sub),true);
       // echo "<pre>"; print_r($sub);die;
        return $sub;
    }

    public function submenues()
    {
        return $this->hasMany('\App\Models\Submenue','menue_id');
    }
}
