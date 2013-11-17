<?php

/**
 * This file is part of the DinecatI18nBundle package.
 * @copyright   2013 Dinecat, http://dinecat.com/
 * @license     http://dinecat.com/en/licenses/MIT.html MIT License
 * @link        https://github.com/dinecat/I18nBundle
 */

namespace Dinecat\I18nBundle\Twig;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * I18n Twig extenstion class.
 * @package     DinecatI18nBundle
 * @subpackage  Twig
 * @author      Mykola Zyk <relo.san.pub@gmail.com>
 */
class I18nExtension extends \Twig_Extension
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Constructor.
     * @param   TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Get translator.
     * @return  TranslatorInterface
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Returns a list of i18n functions.
     * @return  array
     */
    public function getFunctions()
    {
        return [
            'i18n' => new \Twig_Function_Method($this, 'i18n'),
            'i18nc' => new \Twig_Function_Method($this, 'i18nc')
        ];
    }

    /**
     * Returns a list of i18n filters.
     * @return  array
     */
    public function getFilters()
    {
        return [
            'i18n' => new \Twig_Filter_Method($this, 'i18n'),
            'i18nc' => new \Twig_Filter_Method($this, 'i18nc')
        ];
    }

    /**
     * Get translation for key.
     * @param   string  $key        Translation identifier.
     * @param   array   $arguments  An hash of pairs for replacement in translated string [optional].
     * @param   string  $locale     Locale for translation [optional].
     * @return  string
     */
    public function i18n($key, array $arguments = [], $locale = null)
    {
        if (!$addr = $this->parseKey($key)) {
            return $key;
        }
        return $this->translator->trans($addr['index'], $arguments, $addr['dict'], $locale);
    }

    /**
     * Get translation choice for key.
     * @param   string  $key        Translation identifier.
     * @param   int     $number     Number for detection of plural form.
     * @param   array   $arguments  An hash of pairs for replacement in translated string [optional].
     * @param   string  $locale     Locale for translation [optional].
     * @return  string
     */
    public function i18nc($key, $number, array $arguments = [], $locale = null)
    {
        if (!$addr = $this->parseKey($key)) {
            return $key;
        }
        return $this->translator->transChoice(
            $addr['index'],
            $number,
            array_merge([':count' => $number], $arguments),
            $addr['dict'],
            $locale
        );
    }

    /**
     * Returns the name of the extension.
     * @return  string
     */
    public function getName()
    {
        return 'i18n';
    }

    /**
     * Parse key with "dict.index" format.
     * @param   string      $key
     * @return  array|bool  Hash with dict and index if index provided, FALSE otherwise.
     */
    protected function parseKey($key)
    {
        if (mb_strpos($key, '.') === false) {
            $key = 'messages.' . $key;
        }
        list ($dict, $index) = explode('.', $key, 2);
        if (!$index) {
            return false;
        }
        if (!$dict) {
            $dict = 'messages';
        }
        return ['dict' => $dict, 'index' => $index];
    }
}
