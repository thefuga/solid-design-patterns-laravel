<?php

// Violation of DIP. Copy has explicit coupled dependencies (low level details)
class Copier {
    public static function copy() {
	$reader = new KeyboardReader();
	$writer = new Printer();	

	$keystrokes = $reader->readUntillEOF();
	$writer->write($keystrokes);
    }
}
