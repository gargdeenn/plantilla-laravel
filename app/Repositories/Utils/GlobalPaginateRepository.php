<?php

namespace App\Repositories\Utils;

trait GlobalPaginateRepository
{
    /**
    *
    * @method paginate
    *
    * @param array $filters
    * @param string[] $relations
    * @param 'asc' | 'desc' $order
    *
    **/
    public function paginate($filters = [], array $relations = [], string $order = 'asc'): array
    {
        if ($filters && !empty($filters)) {
            return $this->model
                ->with($relations)
                ->filters($filters)
                ->orderBy('created_at', $order)
                ->paginate(20)
                ->toArray();

        } else {
            return $this->model
                        ->with($relations)
                        ->paginate(20)
                        ->toArray();
        }
    }

    public function paginateWithoutFilters(array $relations = []): array
    {
        return $this->model
                    ->with($relations)
                    ->paginate(20)
                    ->toArray();
    }
}
