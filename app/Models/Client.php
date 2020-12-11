<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'firstname','lastname','issue_begin','issue_end','car_id'
    ];

    public function car()
    {
    	return $this->hasOne(\App\Models\Car::class,'id','car_id')->withDefault();
    }

    public function getFormatedBeginDateAttribute()
    {
    	return date('Y-m-d',strtotime($this->issue_begin));
    }

    public function getFormatedBeginTimeAttribute()
    {
    	return date('H:i',strtotime($this->issue_begin));
    }

    public function getFormatedEndDateAttribute()
    {
    	return date('Y-m-d',strtotime($this->issue_end));
    }

    public function getFormatedEndTimeAttribute()
    {
    	return date('H:i',strtotime($this->issue_end));
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
