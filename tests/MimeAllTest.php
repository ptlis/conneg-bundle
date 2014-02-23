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

class MimeAllTest extends WebTestCase
{
    public function testMimeAllOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_all',
            array(),
            array(),
            array('HTTP_ACCEPT' => '*/*')
        );

        $this->assertSame(
            'application/json;q=1,application/xml;q=0.8',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeAllTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_all',
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json;q=0.8,application/xml;q=0.7,text/html;q=0.5')
        );

        $this->assertSame(
            'application/json;q=0.8,application/xml;q=0.56,text/html;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeAllThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_all',
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json;q=0.1,application/xml;q=0.7,text/html;q=0.5')
        );

        $this->assertSame(
            'application/xml;q=0.56,application/json;q=0.1,text/html;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testMimeAllFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/mime_all',
            array(),
            array(),
            array('HTTP_ACCEPT' => '')
        );

        $this->assertSame(
            'application/json;q=0,application/xml;q=0',
            $client->getResponse()->getContent()
        );
    }
}
