<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'bankaccount\\controller\\bankaccount' => '/controller/BankAccount.php',
            'bankaccount\\controller\\bankaccountlist' => '/controller/BankAccountList.php',
            'bankaccount\\framework\\controller\\controllerinterface' => '/framework/controller/Interface.php',
            'bankaccount\\framework\\controller\\exception' => '/framework/controller/Exception.php',
            'bankaccount\\framework\\controller\\factory' => '/framework/controller/Factory.php',
            'bankaccount\\framework\\frontcontroller' => '/framework/FrontController.php',
            'bankaccount\\framework\\hashmap' => '/framework/HashMap.php',
            'bankaccount\\framework\\persistence\\exception' => '/framework/persistence/Exception.php',
            'bankaccount\\framework\\persistence\\factory' => '/framework/persistence/Factory.php',
            'bankaccount\\framework\\persistence\\identitymap' => '/framework/persistence/IdentityMap.php',
            'bankaccount\\framework\\request' => '/framework/Request.php',
            'bankaccount\\framework\\response' => '/framework/Response.php',
            'bankaccount\\framework\\router\\exception' => '/framework/router/Exception.php',
            'bankaccount\\framework\\router\\router' => '/framework/router/Router.php',
            'bankaccount\\framework\\view\\factory' => '/framework/view/Factory.php',
            'bankaccount\\framework\\view\\view' => '/framework/view/View.php',
            'bankaccount\\mapper\\bankaccount' => '/mapper/BankAccount.php',
            'bankaccount\\model\\bankaccount' => '/model/BankAccount.php',
            'bankaccount\\model\\bankaccountexception' => '/model/BankAccountException.php',
            'bankaccount\\view\\bankaccount' => '/view/BankAccount.php',
            'bankaccount\\view\\bankaccountlist' => '/view/BankAccountList.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
