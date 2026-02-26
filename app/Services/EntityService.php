<?php

namespace App\Services;

use App\DTOs\ApiResponseDTO;
use App\DTOs\EntityDTO;
use App\Http\Requests\EntityDeleteRequest;
use App\Http\Requests\EntityRequest;
use App\Models\Entity as ModelsEntity;
use Exception;

class EntityService
{
    public function GetAll()
    {
       try
       {
            $entities = ModelsEntity::all();
            return ApiResponseDTO::success('Se ha obtenido con exito la lista de entidades', EntityDTO::Collection($entities));
       }
       catch (Exception $ex)
       {
            return ApiResponseDTO::error('Ha ocurrido un error');
       }
    }

    public function GetById($id)
    {
          try
          {
               $entity = ModelsEntity::find($id);

               if ($entity == null)
               {
                    return ApiResponseDTO::error('No se ha encontrado la entidad seleccinada');
               }

               return ApiResponseDTO::success('Se ha obtenido con exito la entidad', EntityDTO::FromModel($entity));
          }
          catch (Exception $ex)
          {
               return ApiResponseDTO::error('Ha ocurrido un error');
          }
    }

    public function Store(EntityRequest $entityRequest)
    {
          try
          {
               $entity = new ModelsEntity();
               $entity->name = $entityRequest->name;
               $entity->description = $entityRequest->description;
               $entity->save();
               return ApiResponseDTO::success('Se ha creado con exito la entidad', EntityDTO::FromModel($entity));
          }
          catch (Exception $ex)
          {
               return ApiResponseDTO::error('Ha ocurrido un error');
          }
     }

     public function Update(EntityRequest $entityRequest, int $id)
     {
          try
          {
               $entity = ModelsEntity::find($id);

               if ($entity == null)
               {
                    return ApiResponseDTO::error("La entidad seleccionada no se encuentra registrada en el sistema");
               }

               $entity->name = $entityRequest->name;
               $entity->description = $entityRequest->description;
               $entity->save();

               return ApiResponseDTO::success('Se ha actualizado con exito la entidad', EntityDTO::FromModel($entity));

          }
          catch (Exception $ex)
          {
               return ApiResponseDTO::error('Ha ocurrido un error');
          }
     }

     public function DeleteAll(EntityDeleteRequest $entities)
     {
          try
          {
               ModelsEntity::whereIn('id', $entities->ids)->delete();
               return ApiResponseDTO::success('Se ha eliminado con exito las entidades seleccionadas', null);
          }
          catch (Exception $ex)
          {
               return ApiResponseDTO::error('Ha ocurrido un error');
          }
     }

}