<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model;

class Contact extends Model
{
    use SoftDeletes;
    
    public $timestamps = true;

    protected $table = 'contacts';

    protected $fillable = [
        'name', 'phone', 'email',
        'position', 'company',
        'whatsapp', 'facebook', 'instagram', 'twitter', 'linkedin',
        'is_favorite', 'is_private',
        'created_by', 'updated_by', 'deleted_by',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $hidden = [
        // 
    ];

    protected $attributes = [
        'is_favorite' => false,
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

    public function scopeMy($query, $user_id)
    {
        return $query->where('created_by', $user_id);
    }

    public function scopeFavorites($query)
    {
        return $query->where('is_favorite', true);
    }

    public function scopeRecents($query)
    {
        return $query->orderBy('updated_at', 'DESC');
    }
}
