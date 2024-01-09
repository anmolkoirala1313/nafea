<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallAction extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'homepages';
    protected $fillable = ['id','action_title','action_subtitle','action_button','action_link','action_image','created_by','updated_by'];
}
