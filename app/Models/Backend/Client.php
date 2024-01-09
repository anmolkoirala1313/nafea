<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'clients';
    protected $fillable = ['id','title','link','image','status','created_by','updated_by'];

}
