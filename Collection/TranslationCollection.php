<?php

/**
 * This file is part of the DinecatI18nBundle package.
 * @copyright   2013 Dinecat, http://dinecat.com/
 * @license     http://dinecat.com/en/licenses/MIT.html MIT License
 * @link        https://github.com/dinecat/I18nBundle
 */

namespace Dinecat\I18nBundle\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Dinecat\I18nBundle\Translation\TranslationInterface;

/**
 * Collection of Translation objects.
 * @package     DinecatI18nBundle
 * @subpackage  Collection
 * @author      Mykola Zyk <relo.san.pub@gmail.com>
 */
class TranslationCollection extends ArrayCollection implements TranslationCollectionInterface
{
    /**
     * Initializes a new TranslationCollection.
     * @param   TranslationInterface[]  $elements
     */
    public function __construct(array $elements = [])
    {
        $translations = [];
        foreach ($elements as $element) {
            $translations[$element->getLang()] = $element;
        }
        parent::__construct($translations);
    }

    /**
     * {@inheritDoc}
     */
    public function getTranslation($lang)
    {
        return $this->containsKey($lang) ? $this->get($lang) : null;
    }

    /**
     * {@inheritDoc}
     */
    public function hasTranslation($lang)
    {
        return $this->containsKey($lang);
    }

    /**
     * {@inheritDoc}
     */
    public function addTranslation(TranslationInterface $translation)
    {
        $this->set($translation->getLang(), $translation);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeTranslation($lang)
    {
        return $this->remove($lang);
    }

    /**
     * Adds an translation to the collection.
     * @param   TranslationInterface    $value
     * @throws  \UnexpectedValueException   If $value is not a TranslationInterface instance.
     * @return  boolean Always TRUE.
     */
    public function add($value)
    {
        if (!$value instanceof TranslationInterface) {
            throw new \UnexpectedValueException('Param $value is not a TranslationInterface instance.');
        }
        $this->set($value->getLang(), $value);
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getLanguages()
    {
        return $this->getKeys();
    }
}
