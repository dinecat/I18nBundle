<?php

/**
 * This file is part of the DinecatI18nBundle package.
 * @copyright   2013 Dinecat, http://dinecat.com/
 * @license     http://dinecat.com/en/licenses/MIT.html MIT License
 * @link        https://github.com/dinecat/I18nBundle
 */

namespace Dinecat\I18nBundle\Translation;

/**
 * Trait for owner for Translation object, realize TranslatableInterface.
 * @package     DinecatI18nBundle
 * @subpackage  Translation
 * @author      Mykola Zyk <relo.san.pub@gmail.com>
 *
 * @property    \Doctrine\Common\Collections\ArrayCollection    $translations
 */
trait TranslatableTrait
{
    /**
     * {@inheritDoc}
     */
    public function getTranslation($lang)
    {
        return $this->translations->get($lang);
    }

    /**
     * {@inheritDoc}
     */
    public function hasTranslation($lang)
    {
        return $this->translations->containsKey($lang);
    }

    /**
     * {@inheritDoc}
     */
    public function addTranslation(TranslationInterface $translation)
    {
        $this->translations->set($translation->getLang(), $translation);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeTranslation($lang)
    {
        return $this->translations->remove($lang);
    }

    /**
     * {@inheritDoc}
     */
    public function getLanguages()
    {
        return $this->translations->getKeys();
    }
}
