<?php


namespace App\Events;


use App\Domain\Transactions\Model\Transaction;

class TransactionAddedToDB
{

    /**
     * TransactionAddedToDB constructor.
     * @param Transaction $transaction
     */
    public function __construct(Transaction $transaction)
    {
    }
}
