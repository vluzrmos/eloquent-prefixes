# Eloquent Prefixes

That package allows you to prefix attributes on your eloquent models.

# Installation

    composer require vluzrmos/eloquent-prefixes
    
# Usage

You could use the model:

```php

use Vluzrmos\Database\Eloquent\ModelWithPrefixedAttributes as Model;

class MyModel extends Model {
    
    /**
     * A string that should be used to prefix attributes.
     */
    protected $attributesPrefix = "my_";
    
    /**
     * Array of attributes to prefix
     */ 
    protected $attributesToPrefix = [
        'name',
        'email'
    ];
    
    protected $fillable = [
        'name',
        'email',
        // 'my_name', //only if you need it
        // 'my_email' //only if you need it
    ];
}

```

And then you can use:

```

$model = MyModel::first();

$model->name; //same of $model->my_name;
$model->name = "Vluzrmos"; //same of $model->my_name = "Vluzrmos";

MyModel::create([
   'name' => 'Vagner do Carmo',
   'email' => 'my_email@gmail.com'
]);

// its the same of

MyModel::create([
   'my_name' => 'Vagner do Carmo',
   'my_email' => 'my_email@gmail.com'
]);

//Note:: that should be on your fillable array.

```

You could use the Trait too, that works the same way:

```php

ues Illuminate\Database\Eloquent\Model;
use Vluzrmos\Database\Eloquent\PrefixesAttributes;

class MyModel extends Model {
    
    use PrefixesAttributes;
    
    /**
     * A string that should be used to prefix attributes.
     */
    protected $attributesPrefix = "my_";
    
    /**
     * Array of attributes to prefix
     */ 
    protected $attributesToPrefix = [
        'name',
        'email'
    ];
    
    protected $fillable = [
        'name',
        'email',
        // 'my_name', //only if you need it
        // 'my_email' //only if you need it
    ];
}

```

# TODO

[ ] Work with query builders
[ x ] Work with model attributes
