<?php

namespace App\Filters;

trait BaseFilters
{
    /**
     * @param object $builder
     * @param string|null $data
     * @return void
     */
    private function filterName(object $builder, ?string $data): void
    {
        if ($data) {
            $builder->where('name', 'like', '%' . $data . '%');
        }
    }

    /**
     * @param object $builder
     * @param string $data
     * @return void
     */
    private function filterExcept(object $builder, string $data): void
    {
        $builder->where('id', '!=', $data);
    }

    /**
     * @param object $builder
     * @param string $data
     * @return void
     */
    private function filterStart(object $builder, string $data): void
    {
        $builder->where('date', '>=', $data);
    }

    /**
     * @param object $builder
     * @param string $data
     * @return void
     */
    private function filterEnd(object $builder, string $data): void
    {
        $builder->where('date', '<=', $data);
    }
}
