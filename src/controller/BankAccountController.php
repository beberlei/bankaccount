<?php
class BankAccountController extends Controller
{
    protected $mapper;

    public function __construct(BankAccountMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function execute(Request $request, Response $response)
    {
        $ba = $this->mapper->findById($request->get('id'));

        $response->set('balance', $ba->getBalance());

        return 'BankAccountView';
    }
}
