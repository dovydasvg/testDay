<?php

namespace App\Listeners;

use App\Domain\Transactions\Model\Transaction;
use App\Domain\Transactions\Parsers\AppleTransactionParser;
use App\Domain\Transactions\Parsers\TransactionParser;
use App\Events\TransactionReceived;
use App\Http\Controllers\TransactionController;
use Exception;
use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ParseTransaction
{
    /**
     * @var Transaction
     */
    public $transaction;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param TransactionReceived $event
     * @return void
     * @throws Exception
     */
    public function handle(TransactionReceived $event): void
    {
        $transaction = $event->transaction;
        $provider = $event->provider;
        switch($provider) {
            case TransactionController::PROVIDER_APPLE:
                $parser = new AppleTransactionParser();
                $this->transaction = $parser->parseTransaction($transaction);
                break;
            default:
                throw new InvalidArgumentException('Unknown Payment Provider');
        }
    }
}
