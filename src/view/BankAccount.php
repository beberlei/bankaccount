<?php
namespace bankaccount\view;

use bankaccount\framework\view\View;

class BankAccount extends View
{
    public function render()
    {
        return sprintf(
          "The balance of bank account #%d is %0.2f.\n",
          $this->response->get('id'),
          $this->response->get('balance')
        );
    }
}
