<?php
class BankAccountListView extends View
{
    public function render()
    {
        $buffer = '<ul>';

        foreach ($this->response->get('ids') as $id) {
            $buffer .= sprintf(
              '<li><a href="%s/show/id/%d">Bank Account #%d</a></li>',
              $this->request->getServer('REQUEST_URI'),
              $id,
              $id
            );
        }

        return $buffer . '</ul>';
    }
}
