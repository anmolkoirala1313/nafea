<?php

namespace App\Models\Backend\GeneralSetup;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'states';
    protected $fillable = ['id','title','key','description','status','created_by','updated_by'];

    public function district(){
       return $this->hasMany(District::class,'state_id','id');
    }
}
