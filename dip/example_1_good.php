<?php

class ReusableCopier{
    public function __construct(Reader $reader, Writer $writer) {
	$this->reader = $reader;
	$this->writer = $writer;
    }

    public function copy() {
	$this->writer->write($this->reader->readUntillEOF());
    }
}

class StaticCopier{
    public static function copy(Reader $reader, Writer $writer) {
	$witer->writer($reader->readUntillEOF());
    }
}

// As Copier depends on abstractions, anything that implements the required interface
// can be injected on the object.
// Control is given to the caller.

// ReusableCopier allows for a Copier to be injected as dependency to others.
$copier = new ReusableCopier(new KeyboardReader(), new Printer());
$copier->copy();
$copier = new ReusableCopier(new KeyboardReader(), new NetworkPrinter());
$copier->copy();

// StaticCopier doesn't allow for dependency injection, but may be useful when a 
// simple implementation is required.
// Not recommended when following SOLID as dependency injection is a core concept.
StaticCopier::copy(new KeyboardReader(), new Printer())
