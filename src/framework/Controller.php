<?php
/**
 * @package    bankaccount
 * @subpackage framework
 */
interface Controller
{
    public function execute(Request $request, Response $response);
}
