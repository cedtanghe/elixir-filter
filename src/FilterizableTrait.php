<?php

namespace Elixir\Filter;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
trait FilterizableTrait
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
    public function setFilters(array $filters)
    {
        $this->filters = [];
        
        foreach ($filters as $config) {
            
            $filter = isset($config['filter']) ? $config['filter'] : $config;
            $options = isset($config['options']) ? $config['options'] : [];
            
            $this->addFilter($filter, $options);
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return $this->filters;
    }
}
