<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    // protected $connection = 'sqlite';
    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function scopeSearch($query, $text)
    {
        $fields = $this->fillable;
        $query = $query->where('id', $text);
        foreach ($fields as $field)
        {
            $query = $query->orWhere($field, 'LIKE', '%'.$text.'%');
        }
        return $query;
    }
}
