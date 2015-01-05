<?php

interface IIcecream{
    public function makeicecream();
}

class SimpleIcecream implements IIcecream
{
    public function makeicecream()
    {
        return "Base ice cream";
    }
}

//Now if we want to add new functionality of adding nuts and honey to icecream we can implement a new class

class NuttyDecorator extends SimpleIcecream
{
    private $_baseIcecream;
    public function __construct(SimpleIcecream icecream)
    {
        $this->_BaseIcecream=icecream;
    }
    public function makeicecream()
    {
        echo $this->$_BaseIcecream->makeicecream() + $this->addNuts();
    }
    public function addNuts()
    {
       return "added Nuts";
    }
}

class HoneyDecorator extends SimpleIcecream
{
    private $_baseIcecream;
    public function __construct(SimpleIcecream icecream)
    {
        $this->_BaseIcecream=icecream;
    }
    public function makeicecream()
    {
        echo $this->$_BaseIcecream->makeicecream() + $this->addNuts();
    }
    public function addNuts()
    {
       return "added Honey";
    }
}



//using it ....Similarly we can create other class 

$nuttyIcream=new NuttyDecorator(new SimpleIcecream());
$nuttyHoneyIcecream = new HoneyDecorator($nuttyIcream); //first it will pass nutty object.
$nuttyHoneyIcecream->makeicecream(); //This will output "Base ice cream added Nuts added Honey".

//But how we will do this without inhertance.We can create an abstarct class we can extend from it..


abstarct class IcecreamDecorator implements IIcecream
{
    protected $_baseIcream;
    public function __construct(IIcecream icecream)
    {
        $this->$_baseIcream=icecream;
    }
    public function makeicecream()
    {
        return $this->$_baseIcream->makeicecream();
    }
}



class NuttyDecorator extends IcecreamDecorator
{
    public function __construct(IIcecream icecream){
        super(icecream)
    }

   public function makeicecream()
    {
        echo $this->$_BaseIcecream->makeicecream() + $this->addNuts();
    }
    public function addNuts()
    {
       return "added Nuts";
    }
}

class HoneyDecorator extends IcecreamDecorator
{
     public function __construct(IIcecream icecream){
        super(icecream)
    }

    public function makeicecream()
    {
        echo $this->$_BaseIcecream->makeicecream() + $this->addHoney();
    }
    public function addHoney()
    {
       return "added Honey";
    }
}


$nuttyIcream=new NuttyDecorator(new SimpleIcecream());
$nuttyHoneyIcecream = new HoneyDecorator($nuttyIcream); //first it will pass nutty object.
$nuttyHoneyIcecream->makeicecream(); //This will output "Base ice cream added Nuts added Honey".










