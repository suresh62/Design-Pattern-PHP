<?php
/*consider a situation we have 

1. EnemyAttacker. //interface that contains the basics functionality that everybody needs to implements..
2. EnemyTank.  //Class that implements functionality that is needed.
3. EnemyRobot. //This class has functionality that is different from usual attacker.
4. EnemyRobotAdapeter //We adapt the enemyRobot to enemyTank.
5. main or client // consider a situation where all the client code is accessing the function as 
				  // given by enemyAttacker.Now if we want to change the functionality from 
				//	enemyTank to enemyRobots we need to rewrite the code and functions names here we can use the enemyRobotAdaper
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