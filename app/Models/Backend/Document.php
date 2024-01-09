<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends BackendBaseModel
{
    use HasFactory;

    protected $table    = 'documents';
    protected $fillable = ['id','title','subtitle','description','list_title','list_subtitle','list_description','list_file','created_by','updated_by'];

}
