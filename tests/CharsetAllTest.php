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

class CharsetAllTest extends WebTestCase
{
    public function testCharsetAllOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/charset_all',
            array(),
            array(),
            array('HTTP_ACCEPT_CHARSET' => '*')
        );

        $this->assertSame(
            'utf-8;q=0.8,iso-8859-5;q=0.5',
            $client->getResponse()->getContent()
        );
    }


    public function testCharsetAllTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/charset_all',
            array(),
            array(),
            array('HTTP_ACCEPT_CHARSET' => 'iso-8859-5;q=0.7,utf-8;q=0.9,unicode;q=0.2')
        );

        $this->assertSame(
            'utf-8;q=0.72,iso-8859-5;q=0.35,unicode;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testCharsetAllThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/charset_all',
            array(),
            array(),
            array('HTTP_ACCEPT_CHARSET' => 'utf-8;q=0.1,iso-8859-5,unicode;q=0.5')
        );

        $this->assertSame(
            'iso-8859-5;q=0.5,utf-8;q=0.08,unicode;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testCharsetAllFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/charset_all',
            array(),
            array(),
            array('HTTP_ACCEPT_CHARSET' => '')
        );

        $this->assertSame(
            'utf-8;q=0,iso-8859-5;q=0',
            $client->getResponse()->getContent()
        );
    }
}
