<?php

namespace Elixir\Filter;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */

interface FilterInterface
{
    /**
     * @param mixed $content
     * @param array $options 
     * @return mixed
     */
    public function filter($content, array $options = []);
}
