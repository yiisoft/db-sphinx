Gii ジェネレータを使用する
==========================

このエクステンションは Yii の 'gii' モジュールと統合できるコードジェネレータを提供しています。
これはアクティブレコードのコードを生成することが出来るものです。
これを有効にするためには、あなたのアプリケーションの構成情報を以下のように修正しなければなりません。

```php
return [
    //....
    'modules' => [
        // ...
        'gii' => [
            'class' => 'Yiisoft\Yii\Gii\Module',
            'generators' => [
                'sphinxModel' => [
                    'class' => 'Yiisoft\Db\Sphinx\gii\model\Generator'
                ]
            ],
        ],
    ]
];
```
