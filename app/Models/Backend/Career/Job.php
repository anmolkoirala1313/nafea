<?php

namespace App\Models\Backend\Career;

use App\Models\Backend\BackendBaseModel;
use App\Models\Backend\Career\JobCategory;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    = 'jobs';
    protected $fillable =['id','name','title','code','slug','lt_number','required_number','formlink','min_qualification','image','salary','description','end_date','start_date','status','company','meta_title','meta_tags','meta_description','created_by','updated_by'];

    public function categories(){
        return $this->belongsToMany(JobCategory::class,'category_jobs','job_id','job_category_id');
    }
}
