<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Slug;

    protected $table    ='services';
    protected $fillable = ['id','order','title','key','description','image','status','created_by','updated_by'];

}
