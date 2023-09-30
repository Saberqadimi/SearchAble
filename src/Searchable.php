<?php
namespace Advancelearn\SearchElequent;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    /**
     * @param Builder $query
     * @param string $searchText
     * @param array $searchColumns
     * @param array $relationColumns
     * @return Builder
     */
    public function search($query, string $searchText, array $searchColumns, array $relationColumns = []): Builder
    {
        return $query->where(function($query) use ($searchText, $searchColumns, $relationColumns) {

            foreach ($searchColumns as $searchColumn) {
                $query->orWhere($searchColumn, 'like', '%' .$searchText. '%');
            }

            foreach ($relationColumns as $key => $relationColumn) {
                $query->orWhere(function($query) use($relationColumn, $key, $searchText) {
                    return $query->whereHas($key, function ($query) use($relationColumn, $searchText) {
                        foreach ($relationColumn as $column) {
                            $query->where($column, 'like', '%' .$searchText. '%');
                        }
                    });
                });
            }

            return $query;
        });
    }


}
