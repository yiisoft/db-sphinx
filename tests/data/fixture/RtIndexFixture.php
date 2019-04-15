<?php

namespace yiiunit\sphinx\data\fixture;

use yii\sphinx\ActiveFixture;
use yiiunit\sphinx\data\ar\RtIndex;

class RtIndexFixture extends ActiveFixture
{
    public $modelClass = 'yiiunit\sphinx\data\ar\RtIndex';

    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        $this->dataFile = __DIR__ . '/../fixtures/' . RtIndex::indexName() . '.php';
        parent::init();
    }
}
