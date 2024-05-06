インストール
============

## 必要条件

最低限の必要条件は、Sphinx バージョン 2.0 です。
ただし、エクステンションの全ての機能を使用するためには、Sphinx バージョン 2.2 以降が必要になります。

## Composer パッケージを取得する

このエクステンションをインストールするのに推奨される方法は [Composer](https://getcomposer.org): によるものです。

下記のコマンドを実行してください。

```
php composer.phar require yiisoft/db-sphinx
```

または、あなたの `composer.json` ファイルの `require` セクションに、下記を追加してください。

```
"yiisoft/db-sphinx": "~1.0.0"
```

## 構成

このエクステンションは、MySQL プロトコルと [SphinxQL](https://sphinxsearch.com/docs/current.html#sphinxql) クエリ言語を使用して Sphinx 検索デーモンとやりとりをします。
Sphinx の "searchd" が MySQL プロトコルをサポートするように設定するために、下記の構成情報を追加しなければなりません。

```
searchd
{
    listen = localhost:9306:mysql41
    ...
}
```

そして、このエクステンションを使用するために、アプリケーションの構成情報に下記のコードを追加します。

```php
return [
    //....
    'components' => [
        'sphinx' => [
            'class' => 'Yiisoft\Db\Sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
    ],
];
```
