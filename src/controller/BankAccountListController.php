<?php
class BankAccountListController extends BankAccountController
{
    public function execute(Request $request, Response $response)
    {
        $response->set('ids', $this->mapper->getAllIds());

        return 'BankAccountListView';
    }
}
