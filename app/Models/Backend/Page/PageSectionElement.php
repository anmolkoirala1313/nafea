<?php

namespace App\Models\Backend\Page;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageSectionElement extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='page_section_elements';
    protected $fillable =['id','page_section_id','title','subtitle','image','description','list_title','list_subtitle','list_image','list_description','list_summary','button','status','button_link','created_by','updated_by'];

    public function section()
    {
        return $this->belongsTo(PageSection::class,'page_section_id','id')->with('page');
    }
}
