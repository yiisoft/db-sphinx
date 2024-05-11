# Using Gii Generator

This extension provides a code generator, which can be integrated with [Gii Generator Extension](<https://github.com/yiisoft/yii-gii>). It allows generation of the
[ActiveRecord](https://github.com/yiisoft/active-record) code. In order to enable it, you should adjust your application configuration in following way:

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
