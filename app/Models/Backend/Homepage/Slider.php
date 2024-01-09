<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='sliders';
    protected $fillable = ['id','title','subtitle','button','link','image','status','created_by','updated_by'];

}
