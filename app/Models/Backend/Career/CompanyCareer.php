<?php

namespace App\Models\Backend\Career;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCareer extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    = 'company_careers';
    protected $fillable = ['id','title','slug','required_number','salary','image','description','min_qualification','formlink','start_date','end_date','status','meta_title','meta_tags','meta_description','created_by','updated_by'];

}
