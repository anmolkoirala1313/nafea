<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagingDirector extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='managing_directors';
    protected $fillable = ['id','order','title','designation','description','button','link','image','status','created_by','updated_by'];

}
