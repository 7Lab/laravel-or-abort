<?php

namespace SevenLab\OrAbort;

class QueryBuilder extends \Illuminate\Database\Eloquent\Builder {

    public function findOrAbort($id, $columns = ['*'])
    {
        try {
            return parent::findOrFail($id, $columns);
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
