<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(private ContactService $contact_service) {
       
    }

    public function Index()
    {
        $response = $this->contact_service->GetAllContacts();
        return response()->json($response);
    }

    public function GetById(int $id)
    {
        $response = $this->contact_service->GetById($id);
        return response()->json($response);
    }

    public function Create(ContactRequest $ContactRequest)
    {
        $response = $this->contact_service->Store($ContactRequest);
        return response()->json($response);
    }

    public function Update(ContactRequest $contactRequest, int $id)
    {
        $response = $this->contact_service->Update($contactRequest, $id);
        return response()->json($response);
    }

    public function Delete(int $id)
    {
        $response = $this->contact_service->Delete($id);
        return response()->json($response);
    }

}
