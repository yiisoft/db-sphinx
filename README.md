<p align="center">
<<<<<<< Updated upstream
    <a href="https://sphinxsearch.com" target="_blank" rel="external">
        <img src="https://sphinxsearch.com/images/logo.png" height="55px">
=======
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://yiisoft.github.io/docs/images/yii_logo.svg" height="100px" alt="Yii">
    </a>
    <a href="https://sphinxsearch.com/" target="_blank">
        <img src="https://sphinxsearch.com/images/logo.png" height="80px">
>>>>>>> Stashed changes
    </a>
    <h1 align="center">Yii Database Sphinx Full Text Search Engine extension</h1>
    <br>
</p>

<<<<<<< Updated upstream
This extension adds [Sphinx](https://sphinxsearch.com/docs) full text search engine extension for the [Yii framework](https://www.yiiframework.com).
=======
[![Latest Stable Version](https://poser.pugx.org/yiisoft/db-sphinx/v/stable.png)](https://packagist.org/packages/yiisoft/db-sphinx)
[![Total Downloads](https://poser.pugx.org/yiisoft/db-sphinx/downloads.png)](https://packagist.org/packages/yiisoft/db-sphinx)
[![Build status](https://github.com/yiisoft/db-sphinx/workflows/build/badge.svg)](https://github.com/yiisoft/db-sphinx/actions?query=workflow%3Abuild)
[![Code Coverage](https://codecov.io/gh/yiisoft/db-sphinx/branch/master/graph/badge.svg)](https://codecov.io/gh/yiisoft/db-sphinx)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyiisoft%2F_____%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/yiisoft/db-sphinx/master)
[![static analysis](https://github.com/yiisoft/db-sphinx/workflows/static%20analysis/badge.svg)](https://github.com/yiisoft/db-sphinx/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yiisoft/db-sphinx/coverage.svg)](https://shepherd.dev/github/yiisoft/db-sphinx)
[![psalm-level](https://shepherd.dev/github/yiisoft/db-sphinx/level.svg)](https://shepherd.dev/github/yiisoft/db-sphinx)

This extension adds [Sphinx Full Text Search Engine extension](https://sphinxsearch.com/docs) for the [Yii framework](https://www.yiiframework.com).
>>>>>>> Stashed changes
It supports all Sphinx features including [Real-time Indexes](https://sphinxsearch.com/docs/current.html#rt-indexes).

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

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

```shell
composer require --prefer-dist yiisoft/db-sphinx
```

Configuration
-------------

This extension interacts with Sphinx search daemon using MySQL protocol and [SphinxQL](https://sphinxsearch.com/docs/current.html#sphinxql) query language.
In order to setup Sphinx `searchd` to support [MySQL](https://www.mysql.com/) protocol following configuration should be added:

```php
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
<<<<<<< Updated upstream
=======

## Basic Usage

Since this extension uses MySQL protocol to access Sphinx, it shares base approach and much code from the
regular [Yiisoft\Db](https://github.com/yiisoft/db) package. Running SphinxQL queries a very similar to regular SQL ones:

```php
$sql = 'SELECT * FROM idx_item WHERE group_id = :group_id';
$params = [
    'group_id' => 17
];
$rows = Yii::$app->sphinx->createCommand($sql, $params)->queryAll();
```

You can also use a [Query Builder](https://github.com/yiisoft/db/blob/master/docs/guide/en/query-builder.md):

```php
use Yiisoft\Db\Sphinx\Query;

$query = new Query();
$rows = $query->select('id, price')
    ->from('idx_item')
    ->andWhere(['group_id' => 1])
    ->all();
```

> Note: Sphinx limits the number of records returned by any query to 10 records by default.
  If you need to get more records you should specify limit explicitly.

## Documentation

- Guide: [English](docs/guide/en/README.md), [Português - Brasil](docs/guide/pt-BR/README.md), [Русский](docs/guide/ru/README.md), [日本語](docs/guide/ja/README.md)
- [Internals](docs/internals.md)

If you need help or have a question, the [Yii Forum](https://forum.yiiframework.com/c/yii-3-0/63) is a good place
for that. You may also check out other [Yii Community Resources](https://www.yiiframework.com/community).

## License

The Yii Database Sphinx Full Text Search Engine extension is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Software](https://www.yiiframework.com/).

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Follow updates

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/yiiframework)
[![Telegram](https://img.shields.io/badge/telegram-join-1DA1F2?style=flat&logo=telegram)](https://t.me/yii3en)
[![Facebook](https://img.shields.io/badge/facebook-join-1DA1F2?style=flat&logo=facebook&logoColor=ffffff)](https://www.facebook.com/groups/yiitalk)
[![Slack](https://img.shields.io/badge/slack-join-1DA1F2?style=flat&logo=slack)](https://yiiframework.com/go/slack)
>>>>>>> Stashed changes
