<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerInquiry extends BackendBaseModel
{
    use HasFactory;

    protected $table    ='customer_inquiries';
    protected $fillable = ['id','name','email','phone','subject','type','message','status'];

}
