<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord;

/**
 * Test Sphinx ActiveRecord class
 */
class ActiveRecord extends \Yiisoft\Db\Sphinx\ActiveRecord
{
    public static $db;

    public static function getDb()
    {
        return self::$db;
    }
}
