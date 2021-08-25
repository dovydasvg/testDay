<?php


namespace App\Listeners;


use App\Domain\Transactions\Model\Transaction;
use App\Events\TransactionAddedToDB;
use Illuminate\Support\Facades\DB;

class AddTransactionToDB
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function handle(Transaction $transaction): void
    {
        if($transaction->getEnvironment() === Transaction::DEV_ENV){
            return;
        }
        $savedData = DB::table('transactions')->insert(
            [
                'date' => $transaction->getDate(),
                'type' => $transaction->getType(),
                'subscriptionID' => $transaction->getSubscription()->getID(),
            ]
        );
        event(new TransactionAddedToDB($transaction));
    }

}
