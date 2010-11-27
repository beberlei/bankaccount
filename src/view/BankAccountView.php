<?php
class BankAccountView extends View
{
    public function render()
    {
        return sprintf(
          "The balance of bank account #%d is %0.2f.\n",
          $this->request->getGet('id'),
          $this->response->get('balance')
        );
    }
}
