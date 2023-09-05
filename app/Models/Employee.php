<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'age',
        'phone',
        'photo',
        'team_id',
        'role_id',
        'is_verified',
        'verified_at',
    ];

    public function getPhotoAttribute()
    {
        return url('') . Storage::url($this->attributes['photo']);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
