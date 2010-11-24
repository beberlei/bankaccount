<?php
class DefaultView extends View
{
    public function render()
    {
        return sprintf(
          "The balance of bank account #%d is %0.2f.\n",
          $this->request->get('id'),
          $this->response->getData()['balance']
        );
    }
}
