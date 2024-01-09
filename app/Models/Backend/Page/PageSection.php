<?php

namespace App\Models\Backend\Page;

use App\Models\Backend\BackendBaseModel;
use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageSection extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='page_sections';
    protected $fillable =['id','page_id','title','slug','position','list_number_1','list_number_2','list_number_3','list_number_4','created_by','updated_by','gallery_heading','gallery_subheading'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function pageSectionElements()
    {
        return $this->hasMany(PageSectionElement::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function pageSectionGalleries()
    {
        return $this->hasMany(PageSectionGallery::class);
    }

}
