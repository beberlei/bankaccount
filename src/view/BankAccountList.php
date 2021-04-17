<?php
namespace bankaccount\view;

use bankaccount\framework\view\View;

class BankAccountList extends View
{
    public function render()
    {
        $buffer = '<ul>';

        foreach ($this->response->get('ids') as $id) {
            $buffer .= sprintf(
              '<li><a href="/bankaccount/id/%d">Bank Account #%d</a></li>',
              $id,
              $id
            );
        }

        return $buffer . '</ul>';
    }
}
