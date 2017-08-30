<?php

/**
*
* @var observer 
*
*/

/*
 * Observer - the interface by which the abstract observer will receive messages
 */

interface EventSubscriber{
	function notify($obj);
}

/*
 * Observable - the interface that defines methods for notifying and adding observers, adding events
 */

class Event{

	static private $instance = NULL;
	private $massMedias = [];
	private $event;

	static public function getInstance(){
		if(self::$instance == NULL){
            self::$instance = new Event();
        }
        return self::$instance;
	}

    public function registerMassMedia(EventSubscriber $obj){
    	$this->massMedias[] = $obj;
    }

	public function getEvent(){
        return $this->event;
    }

    public function setEvent($newEvent){
    	$this->event = $newEvent;
    	$this->notifyMassMedias();
    }
    public function notifyMassMedias(){
    	foreach ($this->massMedias as $massMedia) {
    		$massMedia->notify($this);
    	}
    }

	private function __construct(){}
	private function __clone(){}
	private function __sleep(){}
}

/*
 * Abstract observer
 */

abstract class Media implements EventSubscriber{

	protected $nonifyText;
    protected $image;

    public function __construct(){
        Event::getInstance()->registerMassMedia($this);
    }

    public function getNotifyText(){
    	return $this->nonifyText;
    }

    public function getImage(){
        return $this->image;
    }

    abstract public function getTime();
    abstract public function notify($obj);
}

/*
 * Conserne observer 1
 */

class TelevisionMassMedia extends Media{

    function __construct(){
        parent::__construct();
        $this->image = "tv.png";
    }

    public function getTime(){
        return date("g:i a", time()-3*60);
    }

	public function notify($obj){
        if($obj instanceof Event){
            $this->nonifyText = "Hello! You are watching the PC 24 channel and today in our city there will be a large-scale event called the ".Event::getInstance()->getEvent().". Report the event today at 6 pm.";
        }
    }
}

/*
 * Conserne observer 2
 */

class InternetMassMedia extends Media{

    function __construct(){
        parent::__construct();
        $this->image = "site.png";
    }

    public function getTime(){
        return date("g:i a");
    }

	public function notify($obj){
        if($obj instanceof Event){
            $this->nonifyText = "To all subscribers of the PatternCityBlog.com site, greetings! Today there is an interesting event called ".Event::getInstance()->getEvent().". Judging by the stories of our visitors, the event will be very interesting and exciting!";
        }
    }
}

?>