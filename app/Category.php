<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['title','description'];

    public function article()
    {
        return $this->hasMany(('App\Article'));
    }
}
