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
