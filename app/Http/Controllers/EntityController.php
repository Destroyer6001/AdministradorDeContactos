<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntityDeleteRequest;
use App\Http\Requests\EntityRequest;
use App\Services\EntityService;

class EntityController extends Controller
{
    public function __construct(private EntityService $entity_service)
    {
    }

    public function Index()
    {
        $response = $this->entity_service->GetAll();
        return response()->json($response);
    }

    public function GetById($id)
    {
        $response = $this->entity_service->GetById($id);
        return response()->json($response);
    }

    public function Create(EntityRequest $entity)
    {
        $response = $this->entity_service->Store($entity);
        return response()->json($response);
    }

    public function Edit(int $id, EntityRequest $entity)
    {
        $response = $this->entity_service->Update($entity, $id);
        return response()->json($response);
    }

    public function Delete(EntityDeleteRequest $entity)
    {
        $response = $this->entity_service->DeleteAll($entity);
        return response()->json($response);
    }
}
