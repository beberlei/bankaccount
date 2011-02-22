<?php
class BankAccountController implements Controller
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

        catch (OutOfBoundsException $e) {
            throw new ControllerException('No bank account was specified.');
        }

        try {
            $ba = $this->mapper->findById($id);
        }

        catch (OutOfBoundsException $e) {
            throw new ControllerException(
              sprintf('No bank account with id #%d exists.', $id)
            );
        }

        $response->set('balance', $ba->getBalance());

        return 'BankAccountView';
    }
}
