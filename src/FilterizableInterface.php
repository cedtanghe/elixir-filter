<?php

namespace Elixir\Filter;

use Elixir\Filter\FilterInterface;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
interface FilterizableInterface
{
    /**
     * @param FilterInterface $filter
     * @param array $options
     */
    public function addFilter(FilterInterface $filter, array $options = []);
    
    /**
     * @return array
     */
    public function getFilters();
    
    /**
     * @param mixed $data
     * @param array $options
     * @return mixed
     */
    public function filter($data = null, array $options = []);
}
