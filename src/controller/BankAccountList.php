<?php
namespace bankaccount\controller;

use bankaccount\framework\Request;
use bankaccount\framework\Response;

class BankAccountList extends BankAccount
{
    public function execute(Request $request, Response $response)
    {
        $response->set('ids', $this->mapper->getAllIds());

        return 'bankaccount\\view\\BankAccountList';
    }
}
