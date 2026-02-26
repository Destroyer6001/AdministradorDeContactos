<?php

namespace App\Models;

use App\Models\Entity as ModelsEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'age', 'email', 'entity_id', 'document_number'];

    public function entities()
    {
        return $this->BelongsTo(ModelsEntity::class, 'entity_id', 'id');
    }
}
