<?php

namespace App\Models\Backend\Page;

use App\Models\Backend\BackendBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageSectionGallery extends BackendBaseModel
{
    use HasFactory;

    protected $table    ='page_section_galleries';
    protected $fillable =['id','page_section_id','filename','resized_name','original_name','upload_by'];

    public function section()
    {
        return $this->belongsTo(PageSection::class)->with('page');
    }
}
