<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaborRepresentative extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'labor_representatives';
    protected $fillable = ['id','authorized_agency_id','title','contact_number','office_number','address','status','created_by','updated_by'];

    public function authorizedAgency(){
        return $this->belongsTo(AuthorizedAgency::class,'authorized_agency_id', 'id');
    }
}
