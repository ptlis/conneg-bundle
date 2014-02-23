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

class LanguageAllTest extends WebTestCase
{
    public function testLanguageAllOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_all',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => '*')
        );

        $this->assertSame(
            'en-gb;q=0.9,en-us;q=0.6',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageAllTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_all',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => 'en-us;q=0.7,en-gb;q=0.9,es;q=0.2')
        );

        $this->assertSame(
            'en-gb;q=0.81,en-us;q=0.42,es;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageAllThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_all',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => 'en-gb;q=0.1,en-us,es;q=0.5')
        );

        $this->assertSame(
            'en-us;q=0.6,en-gb;q=0.09,es;q=0',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageAllFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_all',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => '')
        );

        $this->assertSame(
            'en-gb;q=0,en-us;q=0',
            $client->getResponse()->getContent()
        );
    }
}
