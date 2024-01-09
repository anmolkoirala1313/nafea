<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyUs extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'homepages';
    protected $fillable = ['id','why_title','why_subtitle','why_description','why_video','why_image','project_completed','happy_clients','visa_approved','success_stories','status','created_by','updated_by'];
}
