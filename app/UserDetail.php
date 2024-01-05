<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = ['first_name', 'last_name', 'gender', 'phone', 'email', 'address', 'summary'];
    protected $dates = ['age'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
