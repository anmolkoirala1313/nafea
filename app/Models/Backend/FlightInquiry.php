<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightInquiry extends BackendBaseModel
{
    use HasFactory;

    protected $table    ='flight_inquiries';
    protected $fillable = ['id','name','email','phone','destination','from','to','flight_date','adults','kids','type','status'];

}
