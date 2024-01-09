<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralGrievance extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'homepages';
    protected $fillable = ['id','grievance_title','grievance_subtitle','grievance_description','grievance_button','grievance_link','status','created_by','updated_by'];
}
