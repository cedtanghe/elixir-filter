<?php

namespace Elixir\Filter;

use Zend\Escaper\Escaper;

/**
 * @author Cédric Tanghe <ced.tanghe@gmail.com>
 */
class EscaperFilter implements FilterInterface
{
    /**
     * @var string
     */
    const HTML_STRATEGY = 'html';

    /**
     * @var string
     */
    const UNESCAPE_HTML_STRATEGY = 'unescape_html';

    /**
     * @var string
     */
    const HTML_ATTR_STRATEGY = 'html_attr';

    /**
     * @var string
     */
    const JS_STRATEGY = 'js';

    /**
     * @var string
     */
    const CSS_STRATEGY = 'css';

    /**
     * @var string
     */
    const URL_STRATEGY = 'url';

    /**
     * @var string
     */
    const UNESCAPE_URL_STRATEGY = 'unescape_url';

    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * @param Escaper $escaper
     */
    public function __construct(Escaper $escaper = null)
    {
        $this->escaper = $escaper;
    }

    /**
     * {@inheritdoc}
     */
    public function filter($value, array $options = [])
    {
        $strategy = isset($options['strategy']) ? $options['strategy'] : self::HTML_STRATEGY;

        switch ($strategy) {
            case self::HTML_STRATEGY:
                return $this->escapeHTML($value);
            case self::UNESCAPE_HTML_STRATEGY:
                return $this->unescapeHTML($value);
            case self::HTML_ATTR_STRATEGY:
                return $this->escapeHTMLAttr($value);
            case self::JS_STRATEGY:
                return $this->escapeJS($value);
            case self::CSS_STRATEGY:
                return $this->escapeCSS($value);
            case self::URL_STRATEGY:
                return $this->escapeURL($value);
            case self::UNESCAPE_URL_STRATEGY:
                return $this->unescapeURL($value);
        }

        return $value;
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function escapeHTML($string)
    {
        if (null !== $this->escaper) {
            return $this->escaper->escapeHtml($string);
        }

        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', true);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function unescapeHTML($string)
    {
        return htmlspecialchars_decode($string, ENT_QUOTES | ENT_HTML401);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function escapeHTMLAttr($string)
    {
        if (null !== $this->escaper) {
            return $this->escaper->escapeHtmlAttr($string);
        }

        return $this->escapeHTML($string);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function escapeJS($string)
    {
        if (null !== $this->escaper) {
            return $this->escaper->escapeJs($string);
        }

        throw new \RuntimeException('Zend\Escaper\Escaper class is required for this method');
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function escapeURL($string)
    {
        return rawurlencode($string);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    public function unescapeURL($string)
    {
        return rawurldecode($pValue);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function escapeCSS($string)
    {
        if (null !== $this->escaper) {
            return $this->escaper->escapeCss($string);
        }

        throw new \RuntimeException('Zend\Escaper\Escaper class is required for this method');
    }

    /**
     * @ignore
     */
    public function __invoke($value, array $options = [])
    {
        return $this->filter($value, $options);
    }
}
