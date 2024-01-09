<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGallery extends BackendBaseModel
{
    use HasFactory;

    protected $table    = 'video_galleries';
    protected $fillable = ['id','title','subtitle','url','type','status','created_by','updated_by'];

}
