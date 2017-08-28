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

interface Information{
	public function getAnimation();
	public function getImage();
	public function getType();
}

/*
 * Implementing Information interface
 */

 class HospitalInformation implements Information{
 	public function getAnimation(){
 		return "hospital.gif";
 	}
 	public function getImage(){
 		return "hospitalComplete.png";
 	}
 	public function getType(){
 		return "Hospital";
 	}
 }

 class SupermarketInformation implements Information{
 	public function getAnimation(){
 		return "supermarket.gif";
 	}
 	public function getImage(){
 		return "supermarketComplete.png";
 	}
 	public function getType(){
 		return "Supermarket";
 	}
 }

 class HouseInformation implements Information{
 	public function getAnimation(){
 		return "house.gif";
 	}
 	public function getImage(){
 		return "houseComplete.png";
 	}
 	public function getType(){
 		return "House";
 	}
 }

/*
 * Implementing Roof interface
 */

class HospitalRoof implements Roof{
	public function buildRoof($type, $material){
		return "Construction of ".$type." ".$material." roof for a hospital complete!";
	}
}

class SupermarketRoof implements Roof{
	public function buildRoof($type, $material){
		return "Construction of ".$type." ".$material." roof for a supermarket complete!";
	}
}

class HouseRoof implements Roof{
	public function buildRoof($type, $material){
		return "Construction of ".$type." ".$material." roof for a house complete!";
	}
}

/*
 * Implementing Walls interface
 */

class HospitalWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		return "Construction of ".$count."-th ".$type." ".$material." walls for a hospital complete!";
	}
}

class SupermarketWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		return "Construction of ".$count."-th ".$type." ".$material." walls for a supermarket complete!";
	}
}

class HouseWalls implements Walls{
	public function buildWalls($type, $material, $heigth, $count){
		return "Construction of ".$heigth."-meter ".$type." ".$material." walls for a house complete!";
	}
}

/*
 * Implementing Windows interface
 */

class HospitalWindows implements Windows{
	public function buildWindows($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." windows for a hospital complete!";
	}

}

class SupermarketWindows implements Windows{
	public function buildWindows($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." windows for a supermarket complete!";
	}
}

class HouseWindows implements Windows{
	public function buildWindows($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." windows for a house complete!";
	}
}

/*
 * Implementing Doors interface
 */

class HospitalDoors implements Doors{
	public function buildDoors($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." doors for a hospital complete!";
	}
}

class SupermarketDoors implements Doors{
	public function buildDoors($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." doors for a supermarket complete!";
	}
}

class HouseDoors implements Doors{
	public function buildDoors($type, $material, $count){
		return "Construction of ".$count."-th ".$type." ".$material." doors for a house complete!";
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
	public function getStructureAnimation();
	public function getStructureImage();
	public function getStructureType();
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
	protected $info;

	function __construct(){
		$this->roof 	 = new HospitalRoof();
		$this->walls 	 = new HospitalWalls();
		$this->windows 	 = new HospitalWindows();
		$this->doors 	 = new HospitalDoors();
		$this->info 	 = new HospitalInformation();
	}

	public function buildRoof($type, $material){
		return $this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		return $this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		return $this->windows->buildWindows($type, $material, $count);
	}

	public function buildDoors($type, $material, $count){
		return $this->doors->buildDoors($type, $material, $count);
	}

	public function getStructureAnimation(){
		return $this->info->getAnimation();
	}
	
	public function getStructureImage(){
		return $this->info->getImage();
	}

	public function getStructureType(){
		return $this->info->getType();
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
	protected $info;

	function __construct(){
		$this->roof 	 = new SupermarketRoof();
		$this->walls 	 = new SupermarketWalls();
		$this->windows 	 = new SupermarketWindows();
		$this->doors 	 = new SupermarketDoors();
		$this->info 	 = new SupermarketInformation();
	}

	public function buildRoof($type, $material){
		return $this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		return $this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		return $this->windows->buildWindows($type, $material, $count);
	}
	
	public function buildDoors($type, $material, $count){
		return $this->doors->buildDoors($type, $material, $count);
	}

	public function getStructureAnimation(){
		return $this->info->getAnimation();
	}
	
	public function getStructureImage(){
		return $this->info->getImage();
	}

	public function getStructureType(){
		return $this->info->getType();
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
	protected $info;

	function __construct(){
		$this->roof 	 = new HouseRoof();
		$this->walls 	 = new HouseWalls();
		$this->windows 	 = new HouseWindows();
		$this->doors 	 = new HouseDoors();
		$this->info 	= new HouseInformation();
	}

	public function buildRoof($type, $material){
		return $this->roof->buildRoof($type, $material);
	}

	public function buildWalls($type, $material, $heigth, $count){
		return $this->walls->buildWalls($type, $material, $heigth, $count);
	}

	public function buildWindows($type, $material, $count){
		return $this->windows->buildWindows($type, $material, $count);
	}
	
	public function buildDoors($type, $material, $count){
		return $this->doors->buildDoors($type, $material, $count);
	}

	public function getStructureAnimation(){
		return $this->info->getAnimation();
	}
	
	public function getStructureImage(){
		return $this->info->getImage();
	}

	public function getStructureType(){
		return $this->info->getType();
	}
}

?>