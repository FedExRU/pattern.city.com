<?php 

/*
 * Observer - интерфейс, с помощью которого наблюдатель будет получать сообщения
 */

interface EventSubscriber{
	function notify($obj);
}

/*
 * Observable - интерфейс, определяющий методы для оповещения и добавления наблюдателей, добавления событий 
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
 * Абстрактный наблюдатель
 */

abstract class Media implements EventSubscriber{

	protected $nonifyText;

    public function __construct(){
        Event::getInstance()->registerMassMedia($this);
    }

    protected function getNotifyText(){
    	echo $this->nonifyText;
    }

    abstract public function notify($obj);
}

class TelevisionMassMedia extends Media{

	public function notify($obj){
        if($obj instanceof Event){
            $this->nonifyText = "Hello! You are watching the PC 24 channel and today in our city there will be a large-scale event called the ".Event::getInstance()->getEvent().". Report the event today at 6 pm.";
            $this->getNotifyText();
        }
    }
}

class InternetMassMedia extends Media{

	public function notify($obj){
        if($obj instanceof Event){
            $this->nonifyText = "To all subscribers of the PatternCityBlog.com site, greetings! Today there is an interesting event called ".Event::getInstance()->getEvent().". Judging by the stories of our visitors, the event will be very interesting and exciting!";
            $this->getNotifyText();
        }
    }
}

$pc24 	= new TelevisionMassMedia();
$pcb 	= new InternetMassMedia();

Event::getInstance()->setEvent("Octoberfest");

?>