アクティブレコードを使用する
============================

このエクステンションは [[\Yiisoft\Db\ActiveRecord]] と類似したアクティブレコードのソリューションを提供しています。
アクティブレコードクラスを宣言するためには、[[\Yiisoft\Db\Sphinx\ActiveRecord]] から拡張して、`indexName` メソッドを実装する必要があります。

```php
use Yiisoft\Db\Sphinx\ActiveRecord;

class Article extends ActiveRecord
{
    /**
     * @return string このアクティブレコードクラスと関連付けられた index の名前
     */
    public static function indexName()
    {
        return 'idx_article';
    }
}
```
