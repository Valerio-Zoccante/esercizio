<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'cookie_id', 'name'
      ];

      public function cookie() {
        return $this->belongsTo('App\Cookie');
    }
}
