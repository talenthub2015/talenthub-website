<?php
/**
 * Created by PhpStorm.
 * User: Piyush Sharma
 * Date: 10/12/2017
 * Time: 10:48 PM
 */

namespace talenthub\Exceptions;


use Exception;

class SessionException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}