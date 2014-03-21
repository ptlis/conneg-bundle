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

namespace ptlis\ConNegBundle\Test\Fixtures\Controller;

use ptlis\ConNeg\Type\Shared\Interfaces\TypeInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for mime best negotiation.
 */
class MimeBest
{
    /**
     * @var TypeInterface
     */
    private $mimeBest;


    /**
     * Constructor.
     *
     * @param TypeInterface $mimeBest
     */
    public function __construct(TypeInterface $mimeBest)
    {
        $this->mimeBest = $mimeBest;
    }


    /**
     * @return Response
     */
    public function index()
    {
        return new Response($this->mimeBest->getType());
    }
}
