<? php

//This is a sample class which creates a connection to db and updates the quantity of cart items..

class InventoryConnection
{
    protected static $_instance = NULL;
    protected $_handle = NULL;
    //we will use this method to get the object..
    public static function getInstance()
    {
        if (!self::$_instance instanceof self) { //Here we check if the instance of this (inventory class) is available..
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    //This function will not be available to other those how want to initialize the class..
    protected function __construct()
    {
        $this->_handle = mysql_connect('localhost', 'user', 'pass');
        mysql_select_db('CD', $this->_handle);
    }
    public function updateQuantity($band, $title, $number)
    {
        $query = "update CDS set amount=amount+" . intval($number);
        $query .= " where band='" . mysql_real_escape_string($band) . "'";
        $query .= " and title='" . mysql_real_escape_string($title) . "'";
        mysql_query($query, $this->_handle);
    }
}

//User of instance class...
class CD
{
    protected $_title = '';
    protected $_band = '';
    public function __construct($title, $band)
    {
        $this->_title = $title;
        $this->_band = $band;
    }
    public function buy()
    {
        $inventory = InventoryConnection::getInstance();//see here we get the object we only get the object not by using new..
        $inventory->updateQuantity($this->_band, $this->_title, -1);
    }
}

//code that uses CD objects...
$boughtCDs = array();
$boughtCDs[] = array('band'=>'Never Again', 'Waste of a Rib');
$boughtCDs[] = array('band'=>'Therapee', 'Long Road');
foreach ($boughtCDs as $boughtCD) {
    $cd = new CD($boughtCD['title'], $boughtCD['band']);
    $cd->buy();
}