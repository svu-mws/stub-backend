<?php

namespace App\Models;

use App\Presenters\PersonPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use QCod\ImageUp\HasImageUploads;

class Person extends Model
{
    use HasImageUploads, PresentableTrait;

    protected $dateFormat = 'dd/mm/yyyy';

    protected $presenter = PersonPresenter::class;

    protected static $imageFields = [
        'profile_image' => [
            'width' => 100,
            'height' => 100,
            'crop' => true,
            'disk' => 'public',
            'path' => 'users',
            'placeholder' => '/users/placeholder.jpg',
            'rules' => 'image|max:2000',
            'auto_upload' => false,
            'file_input' => 'image',
        ]
    ];

    public function __construct(array $guarded=[])
    {
        parent::__construct();
        $this->guarded = $guarded;
    }

    public function getAgeAttribute()
    {
        return Carbon::now()->diffInYears($this->birth_date);
    }
}
