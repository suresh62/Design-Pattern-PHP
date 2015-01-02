<? php


interface IStrategy{
	public function doOperation($num1,$num2)
}


Class Addition implements IStrategy 
{
	public doOperation($num1,$num2)
	{
		return $num1+$num2;
	}
}

Class Subtraction implements IStrategy
{
	public doOperation($num1,$num2)
	{
		return $num1-$num2;
	}
}

//This class does not know how the operation is performed it only cares of executing the strategy by
//getting the appropriate inputs.
Class StrategyContext 
{
	private $strategy;

	public funtion __construct($operation)
	{
		$this->strategy=$operation;
	}

	public function executeOperation($num1,$num2)
	{
		$this->strategy->doOperation($num1,$num2);
	}
}


$strategyContext=new StrategyContext(new Addition());
$strategyContext->executeOperation(5,4); //Executing the operations.

$strategyContext=new StrategyContext(new Subtraction());
$strategyContext->executeOperation(5,4); 