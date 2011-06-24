<?php

namespace Problematic\AuthNetBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;

class ProblematicAuthNetExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->process($configuration->getConfigTree(), $configs);

        if (null === $config['sandbox_mode']) {
            $config['sandbox_mode'] = $container->getParameter('kernel.debug');
        }
        
        $container->setParameter('auth_net.api_login', $config['api_login']);
        $container->setParameter('auth_net.transaction_key', $config['transaction_key']);
        $container->setParameter('auth_net.sandbox_mode', $config['sandbox_mode']);
    }
}
