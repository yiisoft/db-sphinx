<?php

namespace yiiunit\sphinx\data\ar;

/**
 * Test regular DB ActiveRecord class
 */
class ActiveRecordDb extends \Yiisoft\ActiveRecord\ActiveRecord
{
    public static $db;

    public static function getDb()
    {
        return self::$db;
    }
}
