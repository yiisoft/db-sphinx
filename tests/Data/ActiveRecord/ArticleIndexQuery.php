<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord;

use Yiisoft\Db\Sphinx\ActiveQuery;

/**
 * ArticleIndexQuery
 */
class ArticleIndexQuery extends ActiveQuery
{
    public function favoriteAuthor()
    {
        $this->andWhere('author_id=1');

        return $this;
    }
}
