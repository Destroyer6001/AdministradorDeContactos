<?php

namespace App\Services;

use App\DTOs\ApiResponseDTO;
use App\DTOs\ContactDTO;
use App\DTOs\ContactsDetailsDTO;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;

class ContactService
{
    public function GetAllContacts()
    {
        try
        {
            $contacts = Contact::with('entities')->get();
            return ApiResponseDTO::success('Lista de contactos obtenidos correctamente', ContactsDetailsDTO::Collection($contacts));
        }
        catch (Exception $ex)
        {
            return ApiResponseDTO::error('Ha ocurrido un error');
        }
    }

    public function Store(ContactRequest $contactRequest)
    {
        try
        {
            $contact = new Contact();
            $contact->first_name = $contactRequest->first_name;
            $contact->last_name = $contactRequest->last_name;
            $contact->email = $contactRequest->email;
            $contact->age = $contactRequest->age;
            $contact->entity_id = $contactRequest->entity_id;
            $contact->document_number = $contactRequest->document_number;
            $contact->save();

            return ApiResponseDTO::success('Se ha creado con exito el nuevo contacto', ContactDTO::FromModel($contact));
        }
        catch (Exception $ex)
        {
            return ApiResponseDTO::error('Ha ocurrido un error');
        }
    }

    public function GetById(int $id)
    {
        try
        {
            $contact = Contact::find($id);

            if ($contact == null)
            {
                return ApiResponseDTO::error('El contacto seleccionado no se encuentra registrado en el sistema');
            }

            return ApiResponseDTO::success('Se ha obtenido con exito el contacto', ContactDTO::FromModel($contact));

        }
        catch (Exception $ex)
        {
            return ApiResponseDTO::error('Ha ocurrido un error');
        }
    }

    public function Update (ContactRequest $contactRequest, int $id)
    {
        try
        {
            $contact = Contact::find($id);

            if ($contact == null)
            {
                return ApiResponseDTO::error('El contacto seleccionado no se encuentra registrado en el sistema');
            }    

            $contact->first_name = $contactRequest->first_name;
            $contact->last_name = $contactRequest->last_name;
            $contact->age = $contactRequest->age;
            $contact->email = $contactRequest->email;
            $contact->entity_id = $contactRequest->entity_id;
            $contact->document_number = $contactRequest->document_number;
            $contact->save();

            return ApiResponseDTO::success('Se ha actualizado con exito el contacto', ContactDTO::FromModel($contact));
        }
        catch (Exception $ex)
        {
            return ApiResponseDTO::error('Ha ocurrido un error');
        }
    }

    public function Delete(int $id)
    {
        try
        {
            $contact = Contact::find($id);

            if ($contact == null)
            {
                return ApiResponseDTO::error('El contacto seleccionado no se encuentra registrado en el sistema');
            }

            $contact->delete();
            return ApiResponseDTO::success('El contacto seleccionado ha sido eliminado correctamente del sistema', null);
        }
        catch (Exception $ex)
        {
            return ApiResponseDTO::error('Ha ocurrido un error');
        }
    }
}