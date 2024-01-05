<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['school_name', 'address', 'degree', 'field_of_study', 'start_date', 'end_date', 'current_school', 'edu_desc'];
    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
