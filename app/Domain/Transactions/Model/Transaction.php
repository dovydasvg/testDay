<?php


namespace App\Domain\Transactions\Model;


use App\Domain\Subscription\Model\Subscription;
use App\Models\User;
use DateTime;

class Transaction
{
    public const INITIAL_BUY = 'INITIAL BUY';
    public const RENEWAL = 'RENEWAL';
    public const FAILURE_TO_RENEW = 'FAILURE_TO_RENEW';
    public const CANCELLATION = 'CANCELLATION';
    public const DEV_ENV = 'DEV_ENV';
    public const PROD_ENV = 'PROD_ENV';
    /**
     * @var Subscription
     */
    private $subscription;
    private $type;
    /**
     * @var DateTime
     */
    private $date;
    private $environment;

    public function __construct(Subscription $subscription, string $type, DateTime $date, string $environment)
    {
        $this->subscription = $subscription;
        $this->type = $type;
        $this->date = $date;
        $this->environment = $environment;
    }

    /**
     * @return Subscription
     */
    public function getSubscription(): Subscription
    {
        return $this->subscription;
    }

    /**
     * @param Subscription $subscription
     */
    public function setSubscription(Subscription $subscription): void
    {
        $this->subscription = $subscription;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment): void
    {
        $this->environment = $environment;
    }


}
