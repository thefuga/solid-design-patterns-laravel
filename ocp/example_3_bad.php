<?php

// Printer looks at type of the item. If support to new types is added, the class
// has to be updated. Also violates SRP.
class Printer {
    public function __construct($item) {
	$this->item = $item;
    }

    public function print() {
	$class = get_class($this->item);

	switch($class) {
	case Text::class:
	    $printable = $this->item->toString();
	    break;
	case Image::class:
	    $printable = $this->item->path();
	    break;
	case Document::class:
	    $printable = $this->item->format();
	    break;
	}

	Printer::print($printable);
    }
}
