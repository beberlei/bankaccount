<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'bankaccount' => '/model/BankAccount.php',
            'bankaccountcontroller' => '/controller/BankAccountController.php',
            'bankaccountexception' => '/model/BankAccountException.php',
            'bankaccountlistcontroller' => '/controller/BankAccountListController.php',
            'bankaccountlistview' => '/view/BankAccountListView.php',
            'bankaccountmapper' => '/persistence/BankAccountMapper.php',
            'pdobankaccountmapper' => '/persistence/PDOBankAccountMapper.php',
            'doctrinebankaccountmapper' => '/persistence/DoctrineBankAccountMapper.php',
            'bankaccountview' => '/view/BankAccountView.php',
            'controller' => '/framework/Controller.php',
            'controllerexception' => '/framework/ControllerException.php',
            'controllerfactory' => '/framework/ControllerFactory.php',
            'frontcontroller' => '/framework/FrontController.php',
            'hashmap' => '/framework/HashMap.php',
            'mapperexception' => '/framework/MapperException.php',
            'mapperfactory' => '/framework/MapperFactory.php',
            'request' => '/framework/Request.php',
            'response' => '/framework/Response.php',
            'router' => '/framework/Router.php',
            'routerexception' => '/framework/RouterException.php',
            'view' => '/framework/View.php',
            'viewfactory' => '/framework/ViewFactory.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);

// this is just to make this work without configuration from either submodule or PEAR
// dont use that many include paths in production :-)
set_include_path(
   __DIR__ . "/vendor/doctrine2/lib/:" .
   __DIR__ . "/vendor/doctrine2/lib/vendor/doctrine-common/lib:" .
   __DIR__ . "/vendor/doctrine2/lib/vendor/doctrine-dbal/lib:" .
   get_include_path()
);

require_once "Doctrine/Common/ClassLoader.php";

$loader = new \Doctrine\Common\ClassLoader("Doctrine");
$loader->register();
