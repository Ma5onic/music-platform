<?php

namespace ApiBundle\Exceptions;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserNotFoundException extends HttpException
{
    /**
     * Constructor.
     *
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param int        $code     The internal exception code
     */
    public function __construct($message = "User not found", \Exception $previous = null, $code = 0)
    {
        parent::__construct(Response::HTTP_NOT_FOUND, $message, $previous, array(), $code);
    }
}
