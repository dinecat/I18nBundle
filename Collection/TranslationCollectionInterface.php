<?php

/**
 * This file is part of the DinecatI18nBundle package.
 * @copyright   2013 Dinecat, http://dinecat.com/
 * @license     http://dinecat.com/en/licenses/MIT.html MIT License
 * @link        https://github.com/dinecat/I18nBundle
 */

namespace Dinecat\I18nBundle\Collection;

use Dinecat\I18nBundle\Translation\TranslationInterface;

/**
 * Interface for collection of Translation objects.
 * @package     DinecatI18nBundle
 * @subpackage  Collection
 * @author      Mykola Zyk <relo.san.pub@gmail.com>
 */
interface TranslationCollectionInterface
{
    /**
     * Return translation for specified language.
     * @api
     * @param   string  $lang   Language in ISO 639-1 standard.
     * @return  TranslationInterface|null   If translation for provided language not exist, NULL will be returned.
     */
    public function getTranslation($lang);

    /**
     * Check if translation exist for specified language.
     * @api
     * @param   string  $lang   Language in ISO 639-1 standard.
     * @return  boolean TRUE if translation exist for specified language, FALSE otherwise.
     */
    public function hasTranslation($lang);

    /**
     * Add translation.
     * @api
     * @param   TranslationInterface    $translation
     * @return  static
     */
    public function addTranslation(TranslationInterface $translation);

    /**
     * Remove translation for specified language.
     * @api
     * @param   string  $lang   Language in ISO 639-1 standard.
     * @return  TranslationInterface|null   If translation for provided language not exist, NULL will be returned.
     */
    public function removeTranslation($lang);

    /**
     * Get list of language identifiers for existed translations.
     * @api
     * @return  array   List of languages in ISO 639-1 standard.
     */
    public function getLanguages();
}
