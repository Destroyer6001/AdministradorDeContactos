<?php

namespace App\DTOs;

use App\Models\Contact;

class ContactDTO
{
    public function __construct(public int $id, public string $first_name, public string $last_name, public int $age, public string $email, public int $entity_id, public string $document_number)
    {
    }

    public static function FromModel(Contact $contact):self
    {
        return new self($contact->id, $contact->first_name, $contact->last_name, $contact->age, $contact->email, $contact->entity_id, $contact->document_number);
    }
}