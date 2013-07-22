<?php

/**
 * This file is part of the DinecatI18nBundle package.
 * @copyright   2013 Dinecat, http://dinecat.com/
 * @license     http://dinecat.com/en/licenses/MIT.html MIT License
 * @link        https://github.com/dinecat/I18nBundle
 */

namespace Dinecat\I18nBundle\Translation;

/**
 * Interface for Translation object.
 * @package     DinecatI18nBundle
 * @subpackage  Translation
 * @author      Mykola Zyk <relo.san.pub@gmail.com>
 */
interface TranslationInterface
{
    /**
     * Get language identifier in ISO 639-1 standard.
     * @api
     * @return  string
     */
    public function getLang();
}
