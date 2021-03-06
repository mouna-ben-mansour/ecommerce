<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
       $bundles = [
           new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
           new Symfony\Bundle\SecurityBundle\SecurityBundle(),
           new Symfony\Bundle\TwigBundle\TwigBundle(),
           new Symfony\Bundle\MonologBundle\MonologBundle(),
           new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
           //new \Symfony\Bundle\AsseticBundle\AsseticBundle(),

           // doctrine
           new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
           new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),


           // paginator
           new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),

           // image
           new \Liip\ImagineBundle\LiipImagineBundle(),

           // routing
           new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

           // doctrine extension
           new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

           // user
           new FOS\UserBundle\FOSUserBundle(),
           new UserBundle\UserBundle(),

           // admin
           new Knp\Bundle\MenuBundle\KnpMenuBundle(),
           new Sonata\CoreBundle\SonataCoreBundle(),
           new Sonata\BlockBundle\SonataBlockBundle(),
           new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
           new Sonata\AdminBundle\SonataAdminBundle(),

		   // API REST
           new FOS\RestBundle\FOSRestBundle(),
           new JMS\SerializerBundle\JMSSerializerBundle(),
           new Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle(),
           new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
           new Nelmio\CorsBundle\NelmioCorsBundle(),

           // Ecommerce Bundle
           new Ecommerce\BackBundle\EcommerceBackBundle(),
           new Ecommerce\FrontBundle\EcommerceFrontBundle(),
           new Pages\PagesBundle\PagesBundle(),
           new Ecommerce\FrontRestBundle\EcommerceFrontRestBundle(),
           new Ecommerce\FrontAngularBundle\EcommerceFrontAngularBundle(),


       ];

        if (in_array($this->getEnvironment(), ['dev', 'test', 'api'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
            $bundles[] = new Hautelook\AliceBundle\HautelookAliceBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
