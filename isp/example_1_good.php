<?php

// URL methods SEGREGATED to their own interface.
interface HasUrl {
    function currentUrl();
    function setUrl(string $url);
}

// Message methods SEGREGATED to their own interface.
interface HasMessages {
    function consoleMessages();
    function alertMessages();
    function confirmMessages();
    function promptMesasges();
}

// WebPage implements both interfaces.
class WebPage implements HasUrl, HasMessages {
    public function currentUrl(){}
    public function setUrl(string $url){}
    public function consoleMessages(){}
    public function alertMessages(){}
    public function confirmMessages(){}
    public function promptMesasges(){}
}

// VisitCommand now depends only on interfaces that satifies it's needs.
// Clients are more flexible, allowing callers to use them to their only purpose.
class VisitCommand {
    public function __construct(HasUrl $page, string $url) {
	$this->page = $page;
	$this->url = $url;
    }

    public function start() {
	$this->page->setUrl($this->url);
    } 
}
