<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    // use Notifiable;
    
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
        'created_by', 'updated_by', 'deleted_by',

        'website', 'location', 'birth',
        'credits', 'achievements',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'last_visited_at', 'email_verified_at',
        'birth',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $attributes = [
        'is_active' => true,
        'is_admin' => false,
        'is_deputy' => false,
    ];

    public function myContacts()
    {
        return $this->hasMany('App\Contact', 'created_by', 'id');
    }

    public function myEvents()
    {
        return $this->hasMany('App\Event', 'created_by', 'id');
    }

    public function joinedEvents()
    {
        return $this->belongsToMany('App\Event', 'event_members', 'event_id', 'user_id')
            ->withPivot('joined_at', 'is_organizer');
    }

    public function isParticipating($event_id)
    {
        return $this->whereHas('joinedEvents', function ($query) use ($event_id) {
            $query->where('event_id', $event_id);
        })->count() > 0 ? true : false;
    }
}
