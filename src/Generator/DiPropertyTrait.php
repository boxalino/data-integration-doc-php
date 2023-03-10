<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator;

/**
 * Trait DiPropertyTrait
 * Common context functions to sanitize the names for the properties
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
trait DiPropertyTrait
{

    /**
     * Sanitize the property name in order to match the SOLR declared property
     * '\\', '+', '-', '!', '(', ')', ':', '^', '[' , ']', '"', '{' , '}', '~', '*', '?', '|', '&', ';' , '/', ',', ' '
     * These characters are not allowed
     *
     * @param string $property
     * @return string
     */
    public function sanitizePropertyName(string $property) : string
    {
        return preg_replace("/[\s\.\'\,\-\+\/\!\[\]\)\(\:\^\"\{\}\~\*\?\|\&\;\,\\\]/", '_', $property);
    }

    /**
     * @param array $properties
     * @return array
     */
    public function sanitizePropertyNames(array $properties) : array
    {
        array_walk($properties, function(&$property, $k)
        {
            $property = preg_replace("/[\s\.\'\,\-\+\/\!\[\]\)\(\:\^\"\{\}\~\*\?\|\&\;\,\\\]/", '_', $property);
        });

        return $properties;
    }
    

}
