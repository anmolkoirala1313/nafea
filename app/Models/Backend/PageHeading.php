<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageHeading extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'page_headings';
    protected $fillable = ['id','type','title','subtitle','description','status','created_by','updated_by'];

}
