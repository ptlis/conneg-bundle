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

use ptlis\ConNeg\Collection\SharedTypePairCollection;
use Symfony\Component\HttpFoundation\Response;

/**
 * Test controller for encoding all negotiation.
 */
class EncodingAll
{
    /**
     * @var SharedTypePairCollection
     */
    private $encodingList;


    /**
     * Constructor.
     *
     * @param SharedTypePairCollection $encodingList
     */
    public function __construct(SharedTypePairCollection $encodingList)
    {
        $this->encodingList = $encodingList;
    }


    /**
     * @return Response
     */
    public function index()
    {
        return new Response($this->encodingList);
    }
}
