<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord;

class ItemDb extends ActiveRecordDb
{
    public static function tableName()
    {
        return 'yii2_test_item';
    }
}
