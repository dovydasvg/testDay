<?php


namespace App\Domain\Transactions\Parsers;


use App\Domain\Transactions\Factory\TransactionFactory;
use App\Domain\Transactions\Model\Transaction;
use DateTime;

class AppleTransactionParser extends TransactionParser
{

    /**
     * @var TransactionFactory
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new TransactionFactory();
    }

    public function parseTransaction($rawTransaction): Transaction
    {
        $subscriptionID = $rawTransaction['auto_renew_adam_id'];
        $type = $rawTransaction['notification_type'];
        $date = new DateTime();
        $environment = $rawTransaction['environment'];

        return $this->factory->createTransaction($subscriptionID, $type, $date, $environment);
    }
}
