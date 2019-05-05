<?php

namespace Yiisoft\Db\Sphinx\Tests\Data\Fixture;

use yii\test\FixtureTrait;
use Yiisoft\Db\Sphinx\Tests\Data\Fixture\RtIndexFixture;

class MySphinxTestCase
{
    use FixtureTrait;

    public function setUp()
    {
        $this->unloadFixtures();
        $this->loadFixtures();
    }

    public function tearDown()
    {
    }

    public function fixtures()
    {
        return [
            'runtimeIndex' => RtIndexFixture::class,
        ];
    }
}
