    NOTE: this is a work in progress

yii2-time-utils
================

The yii2-time-utils library is an extension for the Yii2 framework that provides utilities for filtering models by dates
in your applications. It includes traits to be used in ActiveQuery classes and behaviors to protect deletion or access
to records.

Requirements
----------

- Yii Framework 2.0.0 or later
- PHP 8.0 or later

Installation
-----------

The recommended way to install this extension is through [Composer](http://getcomposer.org/).

You can run the following command to install the library:

```

composer require eseperio/yii2-time-utils

```

You can also add the following line to your `composer.json` file and then run `composer install`:

```json
"eseperio/yii2-time-utils": "^1.0"
```

Usage
---

Once you have installed the library, you can use its functionalities in your Yii2 application.

### Filtering models by dates

The library provides a trait called `DateFilterTrait` that you can include in your ActiveQuery classes to add date
filtering functionalities. Here's an example of how to use it:

```php
use eseperio\yii2\time\DateFilterTrait;

class MyQuery extends \yii\db\ActiveQuery
{
    use DateFilterTrait;
    
    // Rest of your code here
}
```

Once you have included the trait, you can use the provided methods to filter your models by dates.


Additional Documentation
-----------------------

For more information on how to use this library, you can refer to
the [docs](docs) (pending link).

Contributing
--------------

Contributions are welcome. If you find a bug or want to improve the library, feel free to open an issue or submit a pull
request.

License
--------

The yii2-time-utils library is released under the [MIT License](https://opensource.org/licenses/MIT). You can refer to
the [LICENSE](LICENSE) file for more information.



