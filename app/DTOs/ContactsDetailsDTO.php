<?php

namespace App\DTOs;

use App\Models\Contact;

class ContactsDetailsDTO
{
    public function __construct(public int $id, public string $firstname, public string $lastname, public string $email, public string $document_number, public string $entity_name, public int $age) {
        
    }

    public static function FromModel(Contact $contact): self
    {
        return new self($contact->id, $contact->first_name, $contact->last_name, $contact->email, $contact->document_number, $contact->entities->name, $contact->age);
    }

    public static function Collection($contacts)
    {
        return $contacts->map(fn ($contact) => self::FromModel($contact));
    }
}