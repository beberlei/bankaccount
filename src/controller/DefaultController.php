<?php
class DefaultController extends Controller
{
    protected $mapper;

    public function __construct(BankAccountMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function execute(Request $request, Response $response)
    {
        $ba = $this->mapper->findById($request->get('id'));

        $response->setData('balance', $ba->getBalance());

        return 'DefaultView';
    }
}
