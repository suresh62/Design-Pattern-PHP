<!-- New functionality is constantly being added that requires use of these existing objects in a different way than they were originally designed.
The solution is to build another object, using the Adapter Design Pattern. This Adapter object works as an intermediary between the original application and the new functionality. 
The Adapter Design Pattern defines a new interface for an existing object to match what the new object requires. -->

<?php
/*----------------------------------------------------------------------------------------------------------------*/
//Base error object...
class errorObject
{
    private $__error;
    public function __construct($error)
    {
        $this->__error = $error;
    }
    public function getError()
    {
        return $this->__error;
    }
}
/*-----------------------------------------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------------------------------------*/
//error writer...
class ConsoleLogger
{
    private $__errorObject;
    public function __construct($errorObject)
    {
        $this->__errorObject = $errorObject;
    }
    public function write()
    {
        fwrite(STDERR,$this->__errorObject->getError());
    }
}

/** create the new 404 error object **/
$error = new errorObject("404:Not Found");
/** write the error to the console **/
$log = new logToConsole($error);
$log->write();

/*-----------------------------------------------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------------------------------------------------*/
/*
We  want another writer by which we can write the error to csv file.
And in csv file the error should be written as error no,error text.
So to write the line number and text we need to get the text and number from error object to do that we have to add functions to split the errors.
So we create an adapter*/

class logToCSVAdapter extends errorObject
{
    private $__errorNumber, $__errorText;
    public function __construct($error)
    {
        parent::__construct($error);
        $parts = explode(':', $this->getError());
        $this->__errorNumber = $parts[0];
        $this->__errorText = $parts[1];
    }
    public function getErrorNumber()
    {
        return $this->__errorNumber;
    }
    public function getErrorText()
    {
        return $this->__errorText;
    }
}



//CSV Error Writer
//This doesn't know about adpaterobject and base error object.


class CSVLogger
{
    const CSV_LOCATION = 'log.csv';
    private $__errorObject;
    public function __construct($errorObject)
    {
        $this->__errorObject = $errorObject;
    }
    public function write()
    {
        $line = $this->__errorObject->getErrorNumber();
        $line .= ',';
        $line .= $this->__errorObject->getErrorText();
        $line .= "\n";
        file_put_contents(self::CSV_LOCATION, $line, FILE_APPEND);
    }
}




$error = new logToCSVAdapter("404:Not Found");
/** write the error to the csv file **/
$log = new logToCSV($error);//Implemented this object so that we can write all error to csv format.
$log->write();


?>