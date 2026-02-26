<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'entity_id', 'id');
    }
}
