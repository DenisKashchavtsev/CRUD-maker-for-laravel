<?php

namespace App\Filters;

trait BaseFilters
{

    private function filterName(object $builder, ?string $data): void
    {
        if ($data) {
            $builder->where('name', 'like', '%' . $data . '%');
        }
    }

    private function filterExcept(object $builder, string $data): void
    {
        $builder->where('id', '!=', $data);
    }

    private function filterStart(object $builder, string $data): void
    {
        $builder->where('date', '>=', $data);
    }

    private function filterEnd(object $builder, string $data): void
    {
        $builder->where('date', '<=', $data);
    }
}
