<?php

namespace SevenLab\OrAbort;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait OrAbort {

    use HasRelationships;

    public function newEloquentBuilder($query)
    {
        return new QueryBuilder($query);
    }

    public static function findOrAbort($id, $columns = ['*'])
    {
        try {
            return static::findOrFail($id, $columns);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

    public static function firstOrAbort($columns = ['*'])
    {
        try {
            return static::firstOrFail($columns);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, $e->getMessage());
        }
    }

    protected function newBelongsToMany(Builder $query, Model $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName = null)
    {
        return new BelongsToMany($query, $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName);
    }

    protected function newHasManyThrough(Builder $query, Model $farParent, Model $throughParent, $firstKey, $secondKey, $localKey, $secondLocalKey)
    {
        return new HasManyThrough($query, $farParent, $throughParent, $firstKey, $secondKey, $localKey, $secondLocalKey);
    }
}
