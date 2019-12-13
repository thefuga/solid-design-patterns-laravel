<?php

// Printer knows nothing about the type, just calls for a printable representation
// on the item itself. Polymorphism helps here.
// On the item side, the DECORATOR PATTERN can be used to extend the printable representation.
class Printer {
    public function __construct($item) {
	$this->item = $item;	
    }

    public function print() {
	Printer::print($this->item->printableRepresentation());
    }
}
