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

namespace ptlis\ConNegBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Default bundle configuration.
 */
class Configuration implements ConfigurationInterface
{
    private $forceOptionValues = array(false, true, 'force');

    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ptlis_conneg', 'array');
/*        $rootNode
            ->children()
                ->scalarNode('cache_dir')
                    ->cannotBeEmpty()
                    ->defaultValue('%kernel.cache_dir%/ptlis_con_neg')
                ->end();*/

        return $treeBuilder;
    }
}
