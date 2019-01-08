<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model;

class Event extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'events';

    protected $fillable = [
        'title', 'description', 'location', 'website',
        'is_private', 'start', 'end',
        'color', 'keywords',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'start', 'end',
    ];

    protected $hidden = [
        // 
    ];

    protected $attributes = [
        'is_private' => true,
    ];

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    public function members()
    {
        return $this->belongsToMany('App\User', 'event_members', 'user_id', 'event_id')
            ->withPivot('joined_at', 'is_organizer');
    }

    public function scopeMineOrJoined($query, $user_id)
    {
        return $query->where('created_by', $user_id)
            ->orWhereHas('members', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            });
    }

    public function scopeRecents($query)
    {
        return $query->where('start', '>=', now()->addHours('-2 hours'))
            ->orderBy('start', 'ASC');
    }

    public function scopeToday($query)
    {
        $today = today()->format('Y-m-d');
        return $query->where('start', '=', $today)->orWhere('end', '=', $today);
    }

    public function scopeThisWeek($query)
    {
        $today = today()->format('Y-m-d');
        $week = today()->addDays(7)->format('Y-m-d');
        return $query->where('start', '>=', $today)
            ->orWhere('end', '>=', $today)
            ->where('end', '<=', $week);
    }

    public function scopePublics($query)
    {
        return $query->where('is_private', false);
    }
}
