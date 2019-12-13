<?php

// Unsibscribe provides no flexibility. Closed for extension.
class Unsubscriber {
    public function unsubscribe(User $user) {
	(new SubscriptionCanceller($user))->process;
	(new CancellationNotifier($user))->process;
    } 
}

