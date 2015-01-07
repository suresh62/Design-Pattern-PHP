<?php
/*consider a situation we have 

1. EnemyAttacker. //interface that contains the basics functionality that everybody needs to implements..
2. EnemyTank.  //Class that implements functionality that is needed.
3. EnemyRobot. //This class has functionality that is different from usual attacker.
4. EnemyRobotAdapeter //We adapt the enemyRobot to enemyTank.
5. main or client // consider a situation where all the client code is accessing the function as 
				  // given by enemyAttacker.Now if we want to change the functionality from 
				//	enemyTank to enemyRobots we need to rewrite the code and functions names here we can use the enemyRobotAdaper

Other situation can be where the client has used or called all the functions from a class now what we need is we need to 
change the functionality so we can not create a new class with functionlity and change client so we need a adapter which will
help us it will implement the interface and use the function and implmenets its own logic but the function signature remains the same.


*/


interface EnemyAttacker
{
	public function fireWeapon();
	public function driveForward();
    public function assignDriver($name);
}

Class EnemyTank implements EnemyAttacker
{
	//implements all the functions
}

Class EnemyRobot{

	public function smashWithHands()
	{

	}
	public function WalKForward()
	{
		# code...
	}
	public function reactToHuman()
	{
		# code...
	}
}

Class EnemyRobotAdapeter implements EnemyAttacker
{
	private $enemyRobot;
  
	public function __constructor($enemyRobot)
	{
		$this->enemyRobot=$enemyRobot;
	}
  
	public function fireWeapon()
	{
		$enemyRobot->smashWithHands();
	}

	public function driveForward()
	{
		$enemyRobot->WalKForward();

	}
}


$enemyTank=new EnemyTank();
$enemyRobot=new EnemyRobot();


$enemyAttacker=new EnemyRobotAdapeter($enemyRobot); // this has same interface

$enemyAttacker->fireWeapon();
$enemyAttacker->driveForward();






?>