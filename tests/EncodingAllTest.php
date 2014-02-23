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

class EncodingAllTest extends WebTestCase
{
    public function testEncodingAllOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/encoding_all',
            array(),
            array(),
            array('HTTP_ACCEPT_ENCODING' => '*')
        );

        $this->assertSame(
            'gzip;q=0.85,deflate;q=0.6',
            $client->getResponse()->getContent()
        );
    }


    public function testEncodingAllTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/encoding_all',
            array(),
            array(),
            array('HTTP_ACCEPT_ENCODING' => 'deflate;q=0.7,gzip;q=0.9,compress;q=0.2')
        );

        $this->assertSame(
            'gzip;q=0.765,deflate;q=0.42,compress;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testEncodingAllThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/encoding_all',
            array(),
            array(),
            array('HTTP_ACCEPT_ENCODING' => 'gzip;q=0.1,deflate,compress;q=0.5')
        );

        $this->assertSame(
            'deflate;q=0.6,gzip;q=0.085,compress;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testEncodingAllFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/encoding_all',
            array(),
            array(),
            array('HTTP_ACCEPT_ENCODING' => '')
        );

        $this->assertSame(
            'gzip;q=0,deflate;q=0',
            $client->getResponse()->getContent()
        );
    }
}
