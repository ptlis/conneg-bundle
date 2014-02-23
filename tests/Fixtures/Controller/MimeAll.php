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

use ptlis\ConNeg\Collection\MimeTypePairCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for mime all negotiation.
 */
class MimeAll
{
    /**
     * @var MimeTypePairCollection
     */
    private $mimeList;


    /**
     * Constructor.
     *
     * @param MimeTypePairCollection $mimeList
     */
    public function __construct(MimeTypePairCollection $mimeList)
    {
        $this->mimeList = $mimeList;
    }


    /**
     * @return Response
     */
    public function index()
    {
        return new Response($this->mimeList);
    }
}
