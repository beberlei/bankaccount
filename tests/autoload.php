<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'bankaccountcontrollertest' => '/unit/controller/BankAccountControllerTest.php',
            'bankaccountlistcontrollertest' => '/unit/controller/BankAccountListControllerTest.php',
            'bankaccountlistviewtest' => '/unit/view/BankAccountListViewTest.php',
            'bankaccountmappertest' => '/unit/persistence/BankAccountMapperTest.php',
            'bankaccounttest' => '/unit/model/BankAccountTest.php',
            'bankaccountviewtest' => '/unit/view/BankAccountViewTest.php',
            'controllerfactorytest' => '/unit/framework/ControllerFactoryTest.php',
            'controllertestcase' => '/unit/ControllerTestCase.php',
            'frontcontrollertest' => '/unit/framework/FrontControllerTest.php',
            'hashmaptest' => '/unit/framework/HashMapTest.php',
            'mapperfactorytest' => '/unit/framework/MapperFactoryTest.php',
            'requesttest' => '/unit/framework/RequestTest.php',
            'responsetest' => '/unit/framework/ResponseTest.php',
            'routertest' => '/unit/framework/RouterTest.php',
            'testcontroller' => '/unit/framework/fixture/TestController.php',
            'testview' => '/unit/framework/fixture/TestView.php',
            'viewfactorytest' => '/unit/framework/ViewFactoryTest.php',
            'viewtest' => '/unit/framework/ViewTest.php',
            'viewtestcase' => '/unit/ViewTestCase.php',
            'webtest' => '/system/WebTest.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
