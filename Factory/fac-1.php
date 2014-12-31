<!--  Here the object is created using factory class not using new operator the factory class provides an interface for creating 
the  object.

The client does not know how the object is created factory takes care of it.so now we can add extra objects with out 
affecting the client. -->

//In your factory you need a Map <String, Class<? extends Pet>> //php use an array
//In static constructor of every class, which extends Pet, register it with such map.
//Than creating a class will be just map.get(pet).newInstance ( you'd have to check for nulls, of course)



<? php



interface ICar{

	public function move();
	public function getTyre();
}


Class Ford implements ICar
{
	 //implements functionalities
}

Class Maruti implements ICar
{
	//implements functionalities
}


Class CarFactory {

	public function getCar($type)
	{
		if($type=="Ford")
			return new Ford;
		else if($type=="Maruti")
			return new Maruti;
	}
}


//
$car=new getCar('Ford');
echo $car->getTyre();



?>