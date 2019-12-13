<?php

// Follows DIP. Generalizes UserCharger to be used with any payment gateway through 
// dependency injection.
class UserCharger {
    public function __construct(User $user, PaymentGateway $paymentGateway) {
	$this->user = $user;
	$this->paymentGateway = $paymentGateway;
    }

    public function charge() {
	$this->paymentGateway->charge($this->user->paymentId, MONTHLY_SUBSCRIPTION_FEE);
    }
}

// Class with different interface can't be injected. This may happen when using SDKs
// or external/old libraries.
class PaypalCharger {
    public function createCharge($ammount, $userId) {}
}

// ADAPTER PATTERN allows Paypal to be used as a PaymentGateway.
class PaypalChargerAdapter implements PaymentGateway {
    public function __construct(PaypalCharger $paypalCharger) {
	$this->paypalCharger = $paypalCharger;
    }

    public function charge($userId, $ammount) {
	$this->paypalCharger->createCharge($ammount, $userId); 
    }

}
