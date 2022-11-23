<?php

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class PaymentStates extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Paid::class)
            ->allowTransition(Pending::class, Failed::class);
    }
}
