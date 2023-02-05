<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','description'];

  

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')
        ->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
