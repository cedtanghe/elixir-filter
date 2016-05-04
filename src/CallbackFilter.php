<?php

namespace Elixir\Filter;

use Elixir\Filter\FilterInterface;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
class CallbackFilter implements FilterInterface
{
    /**
     * @var callable
     */
    protected $callback;
    
    /**
     * @param callable $callback
     */
    public function __construct(callable $callback) 
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritdoc}
     */
    public function filter($value, array $options = [])
    {
        return call_user_func_array($this->callback, [$value, $options]);
    }
}
