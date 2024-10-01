<?php

namespace App\Models\Backend;

use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use CountryState;

class Candidate extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'candidates';
    protected $fillable = ['authorized_agency_id','first_name','middle_name','last_name','fullname','email','grievance','initial_password','passport_number','passport_issue_date','passport_expiry_date','issue_place',
        'state','district','address','contact','father_name','mother_name','martial_status','wife_name','children_name','applied_country','applied_for',
        'photo','passport_photo','case_id','case_file','case_file_type','status','created_by','updated_by'];

    public function authorizedAgency(){
       return $this->belongsTo(AuthorizedAgency::class);
    }

    public function getCountryName($country_key){
        $countries = CountryState::getCountries();
        $val = null;
        foreach ($countries as $key=>$value){
            if($country_key == $key){
                $val = $value;
            }
        }
        return $val;
    }
}
