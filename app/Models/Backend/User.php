<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'authorized_agency_id',
        'first_name',
        'middle_name',
        'last_name',
        'slug',
        'email',
        'password',
        'image',
        'contact',
        'address',
        'gender',
        'cover',
        'about',
        'fb',
        'insta',
        'twitter',
        'linkedin',
        'status',
        'oauth_id',
        'oauth_type',
        'user_type',
        'is_candidate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function scopeDescending(Builder $query): void
    {
        $query->orderBy('created_at', 'DESC');
    }

    public function authorizedAgency(){
        return $this->belongsTo(AuthorizedAgency::class,'authorized_agency_id', 'id');
    }
}
