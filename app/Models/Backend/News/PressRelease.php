<?php

namespace App\Models\Backend\News;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PressRelease extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    = 'press_releases';
    protected $fillable = ['id','title','key','slug','description','image','meta_title','meta_tags','meta_description','status','created_by','updated_by'];

}
