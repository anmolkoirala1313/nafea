<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'teams';
    protected $fillable = ['id','order','title','designation','fb_link','twitter_link','instagram_link','linkedin_link','image','status','created_by','updated_by'];

}
