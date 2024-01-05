<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['job_title', 'employer', 'city', 'start_date', 'end_date', 'current_job', 'job_desc'];
    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
