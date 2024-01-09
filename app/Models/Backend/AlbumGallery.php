<?php

namespace App\Models\Backend;

use App\Models\Backend\BackendBaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumGallery extends BackendBaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'album_galleries';
    protected $fillable = ['id','album_id','filename','resized_name','original_name','status','created_by','updated_by'];

    public function album()
    {
        return $this->belongsTo(Album::class,'album_id', 'id');
    }
}
