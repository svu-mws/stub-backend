<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use QCod\ImageUp\HasImageUploads;

class Movie extends Model
{
    use HasImageUploads;

    protected $fillable = ['title', 'description', 'duration', 'release_date', 'cover_image'];
    protected $dateFormat = 'dd/mm/yyyy';

    protected static $imageFields = [
        'cover_image' => [
            'width' => 400,
            'height' => 200,
            'crop' => true,
            'disk' => 'public',
            'path' => 'movies',
            'placeholder' => '/movies/placeholder.jpg',
            'rules' => 'image|max:2000',
            'auto_upload' => false,
            'file_input' => 'image',
        ]
    ];

    // Relationships

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'job_role_movie_staff');
    }

    public function jobRoles()
    {
        return $this->belongsToMany(JobRole::class, 'job_role_movie_staff');
    }
}
