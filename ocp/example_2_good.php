<?php

// Unsubscriber just notifies the observer, allowing each kind of subscription
// to be handled on it's own unsubcription observer. OBSERVER PATTERN will be used
// on the observers.
// CHAIN OF RESPONSIBILITY could be used on the observer to allow adding new 
// unsubscription logic dinamically.
class Unsubscriber {
    public function __construct(Observer $observer) {
	$this-observer = $observer;
    }

    public function unsubscribe(User $user) {
	observer.notify($user); 
    }
}

