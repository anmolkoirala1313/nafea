<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'settings';
    protected $guarded  = ['id'];

}
