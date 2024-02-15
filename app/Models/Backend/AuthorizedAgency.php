<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorizedAgency extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'authorized_agencies';
    protected $fillable = ['id','order','permission_number','membership_number','title','description','address','contact_number','email','promoter_email','promoter_phone','promoter_name','fax','image','status','created_by','updated_by'];

    public function proprietors(){
        return $this->hasMany(Proprietor::class,'authorized_agency_id','id');
    }

    public function laborRepresentatives(){
        return $this->hasMany(LaborRepresentative::class,'authorized_agency_id','id');
    }
}
