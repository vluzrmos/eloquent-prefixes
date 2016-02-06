<?php

namespace Vluzrmos\Database\Eloquent;


trait PrefixesAttributes
{
    /**
     * Get attributes prefix.
     *
     * @return string|null
     */
    public function getAttributesPrefix()
    {
        if (property_exists($this, 'attributesPrefix')) {
            return $this->attributesPrefix;
        }

        return null;
    }

    /**
     * Get an array of attritue that should be prefixed.
     *
     * @return array
     */
    public function getAttributesToPrefix()
    {
        if (property_exists($this, 'attributesToPrefix'))  {
            return $this->attributesToPrefix;
        }

        return [];
    }

    /**
     * Indicates if an attribute should be prefixed.
     *
     * @param string $key
     * @return bool
     */
    public function shouldPrefixAttribute($key)
    {
        return in_array($key, $this->getAttributesToPrefix());
    }

    /**
     * Get a column value with prefix.
     *
     * @param string $key
     * @param string|null $prefix
     * @return mixed
     */
    public function getPrefixedAttributeValue($key, $prefix = null)
    {
        $prefix = $prefix?:$this->getAttributesPrefix();

        return $this->getAttributeValue($prefix.$key);
    }

    /**
     * Set a column value with prefix.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $prefix
     * @return $this
     */
    public function setPrefixedAttributeValue($key, $value, $prefix = null)
    {
        $prefix = $prefix?:$this->getAttributesPrefix();

        return parent::setAttribute($prefix.$key, $value);
    }

    /**
     * Indicates if a attribute has a get mutator or should be prefixed.
     *
     * @param string $key
     * @return bool
     */
    public function hasGetMutator($key)
    {
        return parent::hasGetMutator($key) || $this->shouldPrefixAttribute($key);
    }

    /**
     * Set a given attribute on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if ($this->shouldPrefixAttribute($key)) {
            return $this->setPrefixedAttributeValue($key, $value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * Get the value of an attribute using its mutator and prefixing.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function mutateAttribute($key, $value)
    {
        if ($this->shouldPrefixAttribute($key)){
            return $this->getPrefixedAttributeValue($key);
        }

        return parent::mutateAttribute($key, $value);
    }
}