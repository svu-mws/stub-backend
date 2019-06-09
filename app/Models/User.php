<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Person implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasRoles, PresentableTrait;

    protected $presenter = UserPresenter::class;

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Relationships

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class);
    }

    public function possessionType()
    {
        return $this->belongsTo(PossessionType::class);
    }

    public function internetConnectionType()
    {
        return $this->belongsTo(InternetConnection::class);
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }

    public function movieSelector()
    {
        return $this->belongsTo(MovieSelector::class);
    }

    public function conveyorFormat()
    {
        return $this->belongsTo(ConveyorFormat::class);
    }

    public function tvSignalType()
    {
        return $this->belongsTo(TvSignalType::class);
    }

    public function PPVFrequency()
    {
        return $this->belongsTo(Frequency::class, 'ppv_frequency_id');
    }

    public function buyingFrequency()
    {
        return $this->belongsTo(Frequency::class, 'buying_frequency_id');
    }

    public function rentingFrequency()
    {
        return $this->belongsTo(Frequency::class, 'renting_frequency_id');
    }

    public function viewingFrequency()
    {
        return $this->belongsTo(Frequency::class, 'viewing_frequency_id');
    }

    public function theatreFrequency()
    {
        return $this->belongsTo(Frequency::class, 'theatre_frequency_id');
    }

    public function tvMovieFrequency()
    {
        return $this->belongsTo(Frequency::class, 'tv_movie_frequency_id');
    }

    // JWT

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
