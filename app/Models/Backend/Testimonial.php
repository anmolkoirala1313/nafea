<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='testimonials';
    protected $fillable = ['id','title','position','description','image','status','created_by','updated_by'];

}
