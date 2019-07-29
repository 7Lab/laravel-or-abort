<?php

namespace SevenLab\OrAbort;

class HasManyThrough extends \Illuminate\Database\Eloquent\Relations\HasManyThrough {

    public function findOrAbort($id, $columns = ['*'])
    {
        try {
            return $this->findOrFail($id, $columns);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

    public function firstOrAbort($columns = ['*'])
    {
        try {
            return $this->firstOrFail($columns);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

}
