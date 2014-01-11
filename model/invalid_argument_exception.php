<?php

namespace Quizzard;

class InvalidArgumentException extends \Exception
{
    const DefaultMessage = "";
    const DefaultCode = 0;

    public function __construct(
        $message = InvalidArgumentException::DefaultMessage,
        $code = InvalidArgumentException::DefaultCode,
        $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
}

?>
