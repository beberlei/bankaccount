<?php
namespace bankaccount\controller;

use bankaccount\framework\controller\ControllerInterface;
use bankaccount\framework\controller\Exception;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\mapper\BankAccount as BankAccountMapper;

class BankAccount implements ControllerInterface
{
    protected $mapper;

    public function __construct(BankAccountMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function execute(Request $request, Response $response)
    {
        try {
            $id = $request->get('id');
        }

        catch (\OutOfBoundsException $e) {
            throw new Exception('No bank account was specified.');
        }

        try {
            $ba = $this->mapper->findById($id);
        }

        catch (\OutOfBoundsException $e) {
            throw new Exception(
              sprintf('No bank account with id #%d exists.', $id)
            );
        }

        $response->set('id', $id);
        $response->set('balance', $ba->getBalance());

        return 'bankaccount\\view\\BankAccount';
    }
}
