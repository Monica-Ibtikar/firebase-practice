<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Google\Cloud\Firestore\FirestoreClient;

abstract class BaseModel extends Model
{
    protected static function getFireStoreClient()
    {
        return app(FirestoreClient::class);
    }

    protected function getCollectionReference()
    {
        return $this::getFireStoreClient()->collection($this->table);
    }

    protected function getQuery(array $queries)
    {
        $whereQuery = $this->getCollectionReference();
        foreach ($queries as $query) {
            $whereQuery = $whereQuery->where($query['field'], $query['operator'], $query['value']);
        }
        return $whereQuery;
    }

    public function create(array $attributes)
    {
        $this->getCollectionReference()->add($attributes);
    }

    public function createMany(array $documentsData)
    {
        foreach ($documentsData as $documentsDatum) {
            $this->create($documentsDatum);
        }
    }

    public function findById($id)
    {
        $instance = null;
        $docRef =$this->getCollectionReference()->document($id);
        $snapshot = $docRef->snapshot();
        if($snapshot->exists()) {
            $instance = array_merge(['id' => $id], $snapshot->data());
        }
        return $instance;
    }

    public function update(array $getBy =[], array $attributes = [])
    {
        $docRef = $this->getCollectionReference()->document($getBy['id']);
        $firestoreAttributes = [];
        foreach ($attributes as $key => $value) {
            if(is_array($value)) {
                foreach ($value as $subvalueKey => $subvalueVal) {
                    $firestoreAttributes [] = ['path' => $key.".".$subvalueKey, 'value' => $subvalueVal];
                }
            } else {
                $firestoreAttributes [] = ['path' => $key, 'value' => $value];
            }
        }
        $docRef->update($firestoreAttributes);
    }

    public function allWhere(array $queries = [])
    {
        $documents = $this->getQuery($queries)->documents();
        $instances = [];
        foreach ($documents as $document) {
          if($document->exists()) {
              $instances [] = array_merge(['id' => $document->id()], $document->data());
          }
        }
        return $instances;
    }

    public function delete()
    {
        $docRef =$this->getCollectionReference()->document($this->id);
        $docRef->delete();
    }

    /**
     * Get the Model id.
     *
     * @return string
     */
    public function getIdAttribute()
    {
        return $this->id;
    }

    /**
     * Set the Model id.
     *
     * @return void
     */
    public function setIdAttribute($id)
    {
        $this->id = $id;
    }
}
