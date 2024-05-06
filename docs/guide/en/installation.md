# Installation

## Requirements

At least Sphinx version 2.0 is required. However, in order to use all extension features, Sphinx version 2.2 or
higher is required.

## Getting Composer package

The preferred way to install this extension is through [Composer](https://getcomposer.org):

```shell
composer require yiisoft/db-sphinx
```

## Configuration

This extension interacts with Sphinx search daemon using MySQL protocol and [SphinxQL](https://sphinxsearch.com/docs/current.html#sphinxql) query language.
In order to setup Sphinx "searchd" to support MySQL protocol following configuration should be added:

```
searchd
{
    listen = localhost:9306:mysql41
    ...
}
```

To use this extension, simply add the following code in your application configuration:

```php
return [
    //....
    'components' => [
        'sphinx' => [
            'class' => Yiisoft\Db\Sphinx\Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
    ],
];
```
