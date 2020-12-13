<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    protected $fillable = [
        'name', 'weight', 'calories'
      ];

      public function ingredients() {
        return $this->hasMany('App\Ingredient');
    }
}
