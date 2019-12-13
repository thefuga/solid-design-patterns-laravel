<?php

// Base WebPage with 6 concrete methods. 
class WebPage {
    public function currentUrl(){}
    public function setUrl(string $url){}
    public function consoleMessages(){}
    public function alertMessages(){}
    public function confirmMessages(){}
    public function promptMesasges(){}
}

// Visit command only uses one of the six methods implemented by WebPage.
class VisitCommand {
    public function __construct(WebPage $page, string $url) {
	$this->page = $page;
	$this->url = $url;
    }

    public function start() {
	$this->page->setUrl($this->url);
    } 
}

// A WebPage interface would force the implementation of all six methods, which would still limit client's flexibility.
interface WebPageInterface {
    public function currentUrl();
    public function setUrl(string $url);
    public function consoleMessages();
    public function alertMessages();
    public function confirmMessages();
    public function promptMesasges();
}
