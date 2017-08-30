<?php 

/**
*
* @var fabric method
*
*/

abstract class Embassy{

	protected $name;
	protected $position;

	public static function arrangeMeetingWith($sampleAmbassador){
		return new $sampleAmbassador;
	}

	public function getName(){
		return $this->name;
	}

	public function getPosition(){
		return $this->position;
	}
	/*
	 * Abstract products
	 */
	abstract public function getAnswer();
	abstract public function getArticle();
	abstract public function getImage();
	abstract public function sayHello(); 
}

/*
 * Conserne creators encapsulates products
 */

class EnglishAmbassador extends Embassy{

	function __construct(){
		$this->name = "Stephen Gilbert";
		$this->position = "Ambassador of England";
	}

	public function sayHello(){
		return "Greetings in my office! My name is Stephen Gilbert, and I represent the glorious country of England in this city. You can contact me at any time. How can I help you, my friend?";
	}

	public function getAnswer(){
		return "It was a pleasure to meet you!";
	}

	public function getImage(){
		return "englishAmbassator.png";
	}

	public function getArticle(){
		return "the ";
	}
}

class FrenchAmbassador extends Embassy{

	function __construct(){
		$this->name = "Pascal Durand";
		$this->position = "Ambassadeur de France";
	}

	public function sayHello(){
		return "Salutations dans mon bureau! Je m'appelle Pascal Durand, et je représente le pays glorieux de la France dans cette ville. Vous pouvez me contacter à tout moment. Comment puis-je vous aider, mon ami?";
	}

	public function getAnswer(){
		return "Ce fut un plaisir de vous rencontrer!";
	}

	public function getImage(){
		return "frenchAmbassator.png";
	}

	public function getArticle(){
		return "la ";
	}
}

class GermanAmbassador extends Embassy{

	function __construct(){
		$this->name = "Wolfgang Schneider";
		$this->position = "Botschafter von Deutschland";
	}

	public function sayHello(){
		return "Grüße in meinem Büro! Mein Name ist Wolfgang Schneider, und ich vertrete das herrliche Land Deutschlands in dieser Stadt. Sie können mich jederzeit kontaktieren. Wie kann ich Ihnen helfen, mein Freund?";
	}

	public function getAnswer(){
		return "Es war mit ein Vergnügen Sie kennen zu lernen!";
	}

	public function getImage(){
		return "germanAmbassator.png";
	}

	public function getArticle(){
		return "das ";
	}
}

class RussianAmbassador extends Embassy{

	function __construct(){
		$this->name = "Роман Савельев";
		$this->position = "Посол России";
	}

	public function sayHello(){
			return "Приветствую Вас в моем кабинете! Меня зовут Роман Савельев, и я представляю
		славную страну Россия в этом городе. Можете обращаться ко мне в любое время. Чем я могу
		Вам помочь, друг мой?";
	}

	public function getAnswer(){
		return "Было приятно встретиться с Вами!";
	}

	public function getImage(){
		return "russianAmbassator.png";
	}

	public function getArticle(){
		return " ";
	}
}

/*
 * Alternative method
 */

// interface Greetings{
// 	public function simpleGreetings();
// }

// class AmbassatorGreetings implements Greetings{
// 	public function simpleGreetings(){
// 		return "Hello";
// 	}
// }

// interface Embassy{
// 	public function sayHello();
// }

// class SpainAmbassator implements Embassy{
// 	public function sayHello(){
// 		return new AmbassatorGreetings();
// 	}
// }

// $sp = new SpainAmbassator();
// echo $sp->sayHello()->simpleGreetings();

?>