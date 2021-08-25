<?php


namespace App\Domain\Transactions\Factory;
use App\Domain\Transactions\Model\Transaction;
use App\Events\TransactionCreated;
use DateTime;

class TransactionFactory
{
    public function createTransaction($subscriptionID, $type, DateTime $date, $environment): Transaction
    {
        $transaction = new Transaction($subscriptionID, $type, $date, $environment);
        event(new TransactionCreated($transaction));
        return $transaction;
    }
}
