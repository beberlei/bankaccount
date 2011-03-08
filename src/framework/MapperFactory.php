<?php
class MapperFactory
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMapper($name)
    {
        switch ($name) {
            case 'BankAccountMapper': {
                if (extension_loaded('apc')) {
                    $cache = new \Doctrine\Common\Cache\ApcCache();
                } else {
                    $cache = new \Doctrine\Common\Cache\ArrayCache();
                }
                $config = new Doctrine\ORM\Configuration();
                $config->setProxyDir(__DIR__ . '/proxies'); // proxies not used
                $config->setProxyNamespace('BankAccountProxies');
                $config->setAutoGenerateProxyClasses(true);
                $config->setMetadataCacheImpl($cache);
                $config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(array(
                    __DIR__ . '/../model'
                )));
                
                $em = \Doctrine\ORM\EntityManager::create(array('pdo' => $this->pdo), $config);
                return new DoctrineBankAccountMapper($em);
            }
            break;

            default: {
                return new $name;
            }
        }
    }
}
