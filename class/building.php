<?php 

/**
*
* @var abstract fabric 
*
*/

interface Roof{
	public function buildRoof($type, $material);
}

interface Walls{
	public function buildWalls($type, $material, $heigth, $count);
}

interface Windows{
	public function buildWindows($type, $material, $count);
}

interface Doors{
	public function buildDoors($type, $material, $count);
}

/*
 * Implementing Roof interface
 */

class HospitalRoof implements Roof{
	public function buildRoof($type, $material){
		echo "Construction of ".$type." ".$material." roof for a hospital complete!";
	}

}

class SupermarketRoof implements Roof{
	public function buildRoof($type, $material){
		echo "Construction of ".$type." ".$material." roof for a supermarket complete!";
	}

}

class HouseRoof implements Roof{
	public function buildRoof($type, $material){
		echo "Construction of ".$type." ".$material." roof for a house complete!";
	}
}


/*
 * Implementing Walls interface
 */

class HospitalWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." walls for a hospital complete!";
	}
}

class SupermarketWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." walls for a supermarket complete!";
	}
}

class HouseWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." walls for a house complete!";
	}
}

/*
 * Implementing Windows interface
 */

class HospitalWindows implements Windows{
	public function buildWindows($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." windows for a hospital complete!";
	}

}

class SupermarketWindows implements Windows{
	public function buildWindows($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." windows for a supermarket complete!";
	}
}

class HouseWindows implements Windows{
	public function buildWindows($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." windows for a house complete!";
	}
}

/*
 * Implementing Doors interface
 */

class HospitalDoors implements Doors{
	public function buildDoors($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." doors for a hospital complete!";
	}
}

class SupermarketDoors implements Doors{
	public function buildDoors($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." doors for a supermarket complete!";
	}

}

class HouseDoors implements Doors{
	public function buildDoors($type, $material, $count){
		echo "Construction of ".$count."-th ".$type." ".$material." doors for a house complete!";
	}
}

/*
 * structure - Absrtract factory
 */

interface Structure{
	public function buildRoof($type, $material);
	public function buildWalls($type, $material, $heigth, $count);
	public function buildWindows($type, $material, $count);
	public function buildDoors($type, $material, $count);
}

/*
 * hospital - conserne factory
 */

class Hospital implements Structure
{
	protected $roof; 
	protected $walls;
	protected $windows;
	protected $doors;

	function __construct(){
		$this->roof 	= new HospitalRoof();
		$this->walls 	= new HospitalWalls();
		$this->windows 	= new HospitalWindows();
		$this->doors 	= new HospitalDoors();
	}

	public function buildRoof($type, $material){
		$this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		$this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		$this->windows->buildWindows($type, $material, $count);
	}

	public function buildDoors($type, $material, $count){
		$this->doors->buildDoors($type, $material, $count);
	}
}

/*
 * supermarket - conserne factory 2
 */

class Supermarket implements Structure
{
	protected $roof; 
	protected $walls;
	protected $windows;
	protected $doors;

	function __construct(){
		$this->roof 	= new SupermarketRoof();
		$this->walls 	= new SupermarketWalls();
		$this->windows 	= new SupermarketWindows();
		$this->doors 	= new SupermarketDoors();
	}

	public function buildRoof($type, $material){
		$this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		$this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		$this->windows->buildWindows($type, $material, $count);
	}
	
	public function buildDoors($type, $material, $count){
		$this->doors->buildDoors($type, $material, $count);
	}
}

/*
 * house - conserne factory
 */

class House implements Structure
{
	protected $roof; 
	protected $walls;
	protected $windows;
	protected $doors;

	function __construct(){
		$this->roof 	= new HouseRoof();
		$this->walls 	= new HouseWalls();
		$this->windows 	= new HouseWindows();
		$this->doors 	= new HouseDoors();
	}

	public function buildRoof($type, $material){
		$this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		$this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		$this->windows->buildWindows($type, $material, $count);
	}
	
	public function buildDoors($type, $material, $count){
		$this->doors->buildDoors($type, $material, $count);
	}
}

$hospital = new Hospital();
$hospital->buildRoof("sideing","wooden");
var_dump('expression');
die();

?>