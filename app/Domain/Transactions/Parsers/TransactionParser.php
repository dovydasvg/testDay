<?php


namespace App\Domain\Transactions\Parsers;
use App\Domain\Transactions\Model\Transaction;

abstract class TransactionParser
{
    abstract public function parseTransaction($transaction): Transaction;
}
