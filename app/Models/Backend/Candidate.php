<?php

namespace App\Models\Backend;

use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'candidates';
    protected $fillable = ['user_id','first_name','middle_name','last_name','passport_number','passport_issue_date','passport_expiry_date','issue_place',
        'state','district','address','number','father_name','mother_name','martial_status','wife_name','children_name','applied_country','applied_for',
        'photo','passport_photo','case_id','case_file','case_file_type','status','created_by','updated_by'];

    public function user(){
       return $this->belongsTo(User::class);
    }
}
