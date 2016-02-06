<?php

namespace Vluzrmos\Database\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelWithPrefixedColumns
 * @package Vluzrmos\Database\Eloquent
 */
class ModelWithPrefixedAttributes extends Model
{
    use PrefixesAttributes;

    /**
     * Prefix that used on model attributes.
     *
     * @var string
     */
    protected $attributesPrefix;

    /**
     * Attributes without prefix, that should be prefixed.
     *
     * @var array
     */
    protected $attributesToPrefix = [];


}