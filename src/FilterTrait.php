<?php

namespace Elixir\Validator;

use Elixir\Filter\FilterInterface;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */

trait FilterTrait 
{
    /**
     * @var array
     */
    protected $filters = []; 
    
    /**
     * @param FilterInterface $filter
     * @param array $options
     */
    public function addFilter(FilterInterface $filter, array $options = [])
    {
        $this->filters[] = ['filter' => $filter, 'options' => $options];
    }
    
    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }
    
    /**
     * @return boolean
     */
    abstract public function filter();
}
