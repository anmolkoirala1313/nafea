<?php

namespace App\Models\Backend\Page;

use App\Models\Backend\BackendBaseModel;
use App\Models\Backend\MenuItem;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends BackendBaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='pages';
    protected $fillable =['id','title','slug','image','status','created_by','updated_by'];

    public function pageSections()
    {
        return $this->hasMany(PageSection::class)->orderBy('position', 'ASC');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

}
