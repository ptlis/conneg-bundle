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

use ptlis\ConNeg\Type\TypeInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for language best negotiation.
 */
class LanguageBest
{
    /**
     * @var TypeInterface
     */
    private $languageBest;


    /**
     * Constructor.
     *
     * @param TypeInterface $languageBest
     */
    public function __construct(TypeInterface $languageBest)
    {
        $this->languageBest = $languageBest;
    }


    /**
     * @return Response
     */
    public function index()
    {
        return new Response($this->languageBest->getType());
    }
}
