<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord;

class ItemIndex extends ActiveRecord
{
    public static function indexName()
    {
        return 'yii2_test_item_index';
    }
}
