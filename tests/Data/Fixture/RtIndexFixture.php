<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\Fixture;

use Yiisoft\Db\Sphinx\ActiveFixture;
use Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord\RtIndex;

class RtIndexFixture extends ActiveFixture
{
    public $modelClass = 'Yiisoft\Db\Sphinx\Tests\Data\ActiveRecord\RtIndex';

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        $this->dataFile = __DIR__ . '/../fixtures/' . RtIndex::indexName() . '.php';
        parent::init();
    }
}
