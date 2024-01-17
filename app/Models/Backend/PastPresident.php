<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PastPresident extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'past_presidents';
    protected $fillable = ['id','order','title','duration','designation','fb_link','twitter_link','instagram_link','linkedin_link','image','status','created_by','updated_by'];

}
