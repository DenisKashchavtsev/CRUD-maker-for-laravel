<?php

namespace App\Filters;

trait Filterable
{
    use BaseFilters;

    /**
     * @var array
     */
    protected array $filters = [];
    /**
     * @var array
     */
    private array $filtersForQuery = [];

    /**
     * @param $requestFilters
     * @return self
     */
    public function addFilters($requestFilters): self
    {
        if (is_array($requestFilters)) {
            $this->checkFilters($requestFilters);
        }

        return $this;
    }

    /**
     * @param $requestFilters
     * @return void
     */
    private function checkFilters($requestFilters): void
    {
        foreach ($requestFilters as $key => $value) {
            if (in_array($key, $this->filters)) {
                $this->filtersForQuery[$key] = $value;
            }
        }
    }

    /**
     * @param $query
     * @return object
     */
    private function applyFiltersToQuery($query): object
    {
        foreach ($this->filtersForQuery as $field => $value) {

            $filterMethod = 'filter' . str_replace('_', '', ucwords($field, '_'));

            if (method_exists($this, $filterMethod)) {
                $this->$filterMethod($query, $value);
            } else {
                $query->where($field, $value);
            }
        }

        return $query;
    }
}
