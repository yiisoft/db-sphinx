<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright © 2008 by Yii Software (https://www.yiiframework.com/)
 * @license https://www.yiiframework.com/license/
 */

namespace Yiisoft\Db\Sphinx;

use yii\base\BaseObject;

/**
 * IndexSchema represents the metadata of a Sphinx index.
 *
 * @property array $columnNames List of column names. This property is read-only.
 * @property bool $isRuntime Whether this index is a real-time index. This property is write-only.
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 2.0
 */
class IndexSchema extends BaseObject
{
    /**
     * @var string name of this index.
     */
    public $name;
    /**
     * @var string type of the index.
     */
    public $type;
    /**
     * @var bool whether this index is a real-time index.
     */
    public $isRt;
    /**
     * @var string primary key of this index.
     */
    public $primaryKey;
    /**
     * @var ColumnSchema[] column metadata of this index. Each array element is a [[ColumnSchema]] object, indexed by column names.
     */
    public $columns = [];


    /**
     * Gets the named column metadata.
     * This is a convenient method for retrieving a named column even if it does not exist.
     * @param string $name column name
     * @return ColumnSchema metadata of the named column. Null if the named column does not exist.
     */
    public function getColumn($name)
    {
        return isset($this->columns[$name]) ? $this->columns[$name] : null;
    }

    /**
     * Returns the names of all columns in this table.
     * @return array list of column names
     */
    public function getColumnNames()
    {
        return array_keys($this->columns);
    }

    /**
     * @deprecated
     * This method is deprecated, use [[isRt]] instead.
     * @return bool whether this index is a real-time index.
     * @since 2.0.9
     */
    public function isIsRuntime()
    {
        return $this->isRt;
    }

    /**
     * @deprecated
     * This method is deprecated, use [[isRt]] instead.
     * @param bool $isRuntime whether this index is a real-time index.
     * @since 2.0.9
     */
    public function setIsRuntime($isRuntime)
    {
        $this->isRt = $isRuntime;
    }
}
