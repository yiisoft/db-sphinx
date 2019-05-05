Использование ActiveRecord
======================

Это расширение предоставляет ActiveRecord решение, подобное [[\Yiisoft\Db\ActiveRecord]].
Чтобы объявить класс ActiveRecord, вам нужно расширить [[\Yiisoft\Db\Sphinx\ActiveRecord]] и реализовать метод `indexName`:

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