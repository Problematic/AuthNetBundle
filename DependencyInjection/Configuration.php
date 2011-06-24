<?php

namespace Problematic\AuthNetBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{

    public function getConfigTree()
    {
        $builder = new TreeBuilder();

        $builder->root('problematic_auth_net', 'array')
            ->children()
                ->scalarNode('api_login')->isRequired()->end()
                ->scalarNode('transaction_key')->isRequired()->end()
                ->booleanNode('sandbox_mode')->defaultValue(null)->end()
            ->end()
        ->end();

        return $builder->buildTree();
    }

}
