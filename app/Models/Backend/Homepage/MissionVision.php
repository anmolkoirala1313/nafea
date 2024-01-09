<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissionVision extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'homepages';
    protected $fillable = ['id','mission','vision','value','status','created_by','updated_by'];
}
