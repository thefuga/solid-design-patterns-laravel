<?php

// DIP violation. Charge method is responsible to create and use a dependency.
class UserCharger {
    public function __construct(User $user) {
	$this->user = $user;
    }

    public function charge() {
	WirecardCharger::charge($this->user->paymentId, MONTHLY_SUBSCRIPTION_FEE);
    }
}
