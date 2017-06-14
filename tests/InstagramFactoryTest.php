<?php

/*
 * This file is part of Laravel Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Tests\Instagram;

use MetzWeb\Instagram\Instagram;
use Vinkla\Instagram\InstagramFactory;

/**
 * This is the Instagram factory test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class InstagramFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getInstagramFactory();

        $return = $factory->make([
            'client_id' => 'your-client-id',
            'client_secret' => null,
            'callback_url' => null,
        ]);

        $this->assertInstanceOf(Instagram::class, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutClientId()
    {
        $factory = $this->getInstagramFactory();

        $factory->make([
            'client_secret' => null,
            'callback_url' => null,
        ]);
    }

    protected function getInstagramFactory()
    {
        return new InstagramFactory();
    }
}
