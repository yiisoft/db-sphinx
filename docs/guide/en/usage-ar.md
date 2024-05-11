# Using the ActiveRecord

This extension provides [ActiveRecord](https://github.com/yiisoft/active-record) solution similar ot the `\Yiisoft\Db\ActiveRecord`.
To declare an [ActiveRecord](https://github.com/yiisoft/active-record) class you need to extend `\Yiisoft\Db\Sphinx\ActiveRecord` and
implement the `indexName` method:

```php
use Yiisoft\Db\Sphinx\ActiveRecord;

class Article extends ActiveRecord
{
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function indexName()
    {
        return 'idx_article';
    }
}
```
