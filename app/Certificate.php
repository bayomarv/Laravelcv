<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['certificate', 'issuer', 'date', 'address'];
    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
