<?php
// In /module/Blog/src/Factory/LaminasDbSqlRepositoryFactory.php
namespace Blog\Factory;

use Blog\Model\LaminasDbSqlCommand;
use Interop\Container\ContainerInterface;
use Blog\Model\Post;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Laminas\ServiceManager\Factory\FactoryInterface;

class LaminasDbSqlCommandFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LaminasDbSqlCommand(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Post('', '')
        );
    }
}