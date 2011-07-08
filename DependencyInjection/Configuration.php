<?php

namespace Problematic\AuthNetBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration
{

    public function getConfigTree()
    {
        $builder = new TreeBuilder();
        $root = $builder->root('problematic_auth_net');

        $root
            ->children()
                ->scalarNode('api_login')->isRequired()->end()
                ->scalarNode('transaction_key')->isRequired()->end()
                ->booleanNode('sandbox_mode')->defaultNull()->end()
                ->scalarNode('event_listener')->end()
            ->end()
        ->end();

        $this->addArbSection($root);

        return $builder->buildTree();
    }

    private function addArbSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('arb')
                    ->children()
                        ->scalarNode('form')->defaultValue('Problematic\AuthNetBundle\Form\SubscriptionType')->end()
                    ->end()
                ->end()
            ->end();
    }

}
