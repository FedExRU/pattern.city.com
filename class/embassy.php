<?php 
/*
 * Абстрактный создатель Creator
 */
abstract class Embassy
{
	public static function arrangeMeetingWith($country){
		return new $country;
	}
	/*
	 * Абстрактный продукт Product
	 */
	abstract public function sayHello(); 
}

/*
 * Конкретные создатели инкапсулирует конкретный продукт (приветствие)
 */

class RussianAmbassator extends Embassy{
	public function sayHello(){
		echo "Добрый день!";
	}
}

class EnglishAmbassator extends Embassy{
	public function sayHello(){
		echo "Good day!";
	}
}

class GermanAmbassator extends Embassy{
	public function sayHello(){
		echo "Guten tag!";
	}
}

class SpainAmbassator extends Embassy{
	public function sayHello(){
		echo "¡Buenas tardes!";
	}
}
header('Content-type: text/plain; charset=utf-8');

$spAmbassator = Embassy::arrangeMeetingWith("SpainAmbassator");

$spAmbassator->sayHello();
?>