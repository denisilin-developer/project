<?php

namespace App\Filters;

use Cerbero\QueryFilters\QueryFilters;

/**
 * Filter records based on query parameters.
 *
 */
class ItemsFilter extends QueryFilters
{
    public function name($name)
    {
        $this->query->where('name', 'like', '%' . $name . '%');
    }

    public function bedrooms($bedrooms)
    {
        $this->query->where('bedrooms', $bedrooms);
    }

    public function bathrooms($bathrooms)
    {
        $this->query->where('bathrooms', $bathrooms);
    }

    public function storeys($storeys)
    {
        $this->query->where('storeys', $storeys);
    }

    public function garages($garages)
    {
        $this->query->where('garages', $garages);
    }

    public function priceFrom($price)
    {
        $this->query->where('price', '>', $price);
    }

    public function priceTo($price)
    {
        $this->query->where('price', '<', $price);
    }
}
