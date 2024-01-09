<?php

namespace App\Models\Backend\Homepage;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomePageRecruitment extends BackendBaseModel
{
    use HasFactory;

    protected $table    ='homepage_recruitments';
    protected $fillable = ['id','homepage_id','title','icon','description','created_by','updated_by'];

    public function homePage(){
        return $this->belongsTo(Welcome::class,'homepage_id','id');
    }

}
