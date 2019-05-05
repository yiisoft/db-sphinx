<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord;

use Yiisoft\Db\Sphinx\ActiveQuery;

class ArticleDb extends ActiveRecordDb
{
    public static function tableName()
    {
        return 'yii2_test_article';
    }

    public function getIndex()
    {
        return new ActiveQuery(ArticleIndex::class, [
            'primaryModel' => $this,
            'link' => ['id' => 'id'],
            'multiple' => false,
        ]);
    }
}
