<?php

namespace Elixir\Filter;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
interface FilterInterface
{
    /**
     * @param mixed $value
     * @param array $options 
     * @return mixed
     */
    public function filter($value, array $options = []);
}
