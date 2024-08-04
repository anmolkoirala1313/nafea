<?php

namespace App\Models\Backend\GeneralSetup;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'districts';
    protected $fillable  = ['id','state_id','title','key','description','status','created_by','updated_by'];

    public function state()
    {
        return $this->belongsTo(State::class,'state_id', 'id');
    }
}
