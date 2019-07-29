<?php

namespace SevenLab\OrAbort;

class BelongsToMany extends \Illuminate\Database\Eloquent\Relations\BelongsToMany {

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
