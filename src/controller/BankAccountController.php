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
        switch ($request->get('action')) {
            case 'default':
            case 'show': {
                return $this->executeShow($request, $response);
            }
            break;

            default: {
                throw new OutOfBoundsException;
            }
        }
    }

    protected function executeShow(Request $request, Response $response)
    {
        try {
            $id = $request->get('id');
        }

        catch (OutOfBoundsException $id) {
            $response->set('ids', $this->mapper->all());

            return 'BankAccountListView';
        }

        $ba = $this->mapper->findById($id);

        $response->set('balance', $ba->getBalance());

        return 'BankAccountView';
    }
}
