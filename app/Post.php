<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post','updated_at'];


    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
