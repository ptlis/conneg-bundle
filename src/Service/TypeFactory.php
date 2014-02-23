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

namespace ptlis\ConNegBundle\Service;

use ptlis\ConNeg\Collection\MimeTypePairCollection;
use ptlis\ConNeg\Collection\SharedTypePairCollection;
use ptlis\ConNeg\Negotiate;
use ptlis\Conneg\TypePair\TypePairInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Factory service that creates Types, TypeCollections for content negotiation.
 */
class TypeFactory
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var Negotiate
     */
    private $negotiate;


    /**
     * Constructor
     *
     * @param RequestStack $requestStack
     * @param Negotiate    $negotiate
     */
    public function __construct(RequestStack $requestStack, Negotiate $negotiate)
    {
        $this->requestStack = $requestStack;
        $this->negotiate = $negotiate;
    }


    /**
     * Return a collection of negotiated charsets in descending order of preference.
     *
     * @param $appTypes
     *
     * @return SharedTypePairCollection
     */
    public function charsetAll($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_CHARSET', '');

        return $this->negotiate->charsetAll($uaField, $appTypes);
    }


    /**
     * Return the best matching charset.
     *
     * @param $appTypes
     *
     * @return TypePairInterface
     */
    public function charsetBest($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_CHARSET', '');

        return $this->negotiate->charsetBest($uaField, $appTypes);
    }


    /**
     * Return a collection of negotiated encodings in descending order of preference.
     *
     * @param $appTypes
     *
     * @return SharedTypePairCollection
     */
    public function encodingAll($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_ENCODING', '');

        return $this->negotiate->encodingAll($uaField, $appTypes);
    }


    /**
     * Return the best matching encoding.
     *
     * @param $appTypes
     *
     * @return TypePairInterface
     */
    public function encodingBest($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_ENCODING', '');

        return $this->negotiate->encodingBest($uaField, $appTypes);
    }


    /**
     * Return a collection of negotiated languages in descending order of preference.
     *
     * @param $appTypes
     *
     * @return SharedTypePairCollection
     */
    public function languageAll($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_LANGUAGE', '');

        return $this->negotiate->languageAll($uaField, $appTypes);
    }


    /**
     * Return the best matching language.
     *
     * @param $appTypes
     *
     * @return TypePairInterface
     */
    public function languageBest($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT_LANGUAGE', '');

        return $this->negotiate->languageBest($uaField, $appTypes);
    }


    /**
     * Return a collection of negotiated mime types in descending order of preference.
     *
     * @param $appTypes
     *
     * @return MimeTypePairCollection
     */
    public function mimeAll($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT', '');

        return $this->negotiate->mimeAll($uaField, $appTypes);
    }


    /**
     * Return the best matching mime type.
     *
     * @param $appTypes
     *
     * @return TypePairInterface
     */
    public function mimeBest($appTypes)
    {
        $request = $this->requestStack->getCurrentRequest();

        $uaField = $request->server->get('HTTP_ACCEPT', '');

        return $this->negotiate->mimeBest($uaField, $appTypes);
    }
}
