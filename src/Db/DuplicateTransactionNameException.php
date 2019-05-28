<?php

namespace The\Db;

class DuplicateTransactionNameException extends \Exception
{
    public function __construct(string $transaction_name)
    {
        parent::__construct(
            "Transaction name '{$transaction_name}' is already active."
        );
    }
}
