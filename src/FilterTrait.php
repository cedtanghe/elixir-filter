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
     * {@inheritdoc}
     */
    public function addFilter(FilterInterface $filter, array $options = [])
    {
        $this->filters[] = ['filter' => $filter, 'options' => $options];
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return $this->filters;
    }
}
