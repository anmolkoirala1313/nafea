<?php

namespace App\Models\Backend\Career;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCategory extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='job_categories';
    protected $fillable = ['id','title','slug','image','status','created_by','updated_by'];

    public function jobs(){
        return $this->belongsToMany(Job::class,'category_jobs','job_category_id','job_id');
    }
}
