<?php
class DefaultController extends Controller
{
    public function execute(Request $request, Response $response)
    {
        $mapper = new BankAccountMapper(
          Registry::getInstance()->getObject('pdo')
        );

        $ba = $mapper->findById($request->get('id'));

        $response->setData('balance', $ba->getBalance());

        return new DefaultView($request, $response);
    }
}
