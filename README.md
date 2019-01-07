<p align="center">
    <a href="http://sphinxsearch.com" target="_blank" rel="external">
        <img src="http://sphinxsearch.com/images/logo.png" height="55px">
    </a>
    <h1 align="center">Yii Framework Sphinx full text search engine extension</h1>
    <br>
</p>

This extension adds [Sphinx](http://sphinxsearch.com/docs) full text search engine extension for the [Yii framework](http://www.yiiframework.com).
It supports all Sphinx features including [Real-time Indexes](http://sphinxsearch.com/docs/current.html#rt-indexes).

For license information check the [LICENSE](LICENSE.md)-file.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/db-sphinx/v/stable.png)](https://packagist.org/packages/yiisoft/db-sphinx)
[![Total Downloads](https://poser.pugx.org/yiisoft/db-sphinx/downloads.png)](https://packagist.org/packages/yiisoft/db-sphinx)
[![Build Status](https://travis-ci.org/yiisoft/db-sphinx.svg?branch=master)](https://travis-ci.org/yiisoft/db-sphinx)


Requirements
------------

At least Sphinx version 2.0 is required. However, in order to use all extension features, Sphinx version 2.2.3 or
higher is required.


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
composer require --prefer-dist yiisoft/db-sphinx
```

Configuration
-------------

This extension interacts with Sphinx search daemon using MySQL protocol and [SphinxQL](http://sphinxsearch.com/docs/current.html#sphinxql) query language.
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
            'class' => yii\sphinx\Connection::class,
            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
    ],
];
```
