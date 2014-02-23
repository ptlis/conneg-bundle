<?php

/**
 * @copyright   (c) 2014 brian ridley
 * @author      brian ridley <ptlis@ptlis.net>
 * @license     http://opensource.org/licenses/MIT MIT
 *
 * PHP Version 5.3
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ptlis\ConNegBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MimeBestTest extends WebTestCase
{
    public function testMimeBestOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_best',
            array(),
            array(),
            array('HTTP_ACCEPT' => '*/*')
        );

        $this->assertSame(
            'application/json',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeBestTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_best',
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json;q=0.8,application/xml;q=0.7,text/html;q=0.5')
        );

        $this->assertSame(
            'application/json',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeBestThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_best',
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json;q=0.1,application/xml;q=0.7,text/html;q=0.5')
        );

        $this->assertSame(
            'application/xml',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeBestFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_best',
            array(),
            array(),
            array('HTTP_ACCEPT' => '')
        );

        $this->assertSame(
            'application/json',
            $client->getResponse()->getContent()
        );
    }
}
