<?php

namespace Problematic\AuthNetBundle\AuthorizeNet\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{

    public function getConfigTree()
    {
        $builder = new TreeBuilder();

        $builder->root('problematic_authnet', 'array')
            ->children()
                ->scalarNode('api_login')->isRequired()->end()
                ->scalarNode('transaction_key')->isRequired()->end()
                ->booleanNode('sandbox_mode')->isRequired()->end()
            ->end()
        ->end();

        return $builder->buildTree();
    }

}
