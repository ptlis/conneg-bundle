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

class LanguageBestTest extends WebTestCase
{
    public function testLanguageBestOne()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_best',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => '*')
        );

        $this->assertSame(
            'en-gb',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageBestTwo()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_best',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => 'en-us;q=0.7,en-gb;q=0.9,es;q=0.2')
        );

        $this->assertSame(
            'en-gb',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageBestThree()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_best',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => 'en-gb;q=0.1,en-us,es;q=0.5')
        );

        $this->assertSame(
            'en-us',
            $client->getResponse()->getContent()
        );
    }


    public function testLanguageBestFour()
    {
        $client = static::createClient();

        $client->request(
            'GET',
            '/language_best',
            array(),
            array(),
            array('HTTP_ACCEPT_LANGUAGE' => '')
        );

        $this->assertSame(
            'en-gb',
            $client->getResponse()->getContent()
        );
    }
}
