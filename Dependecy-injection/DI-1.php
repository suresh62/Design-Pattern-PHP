
<?php

class StockItem {
  
  private $quantity;
  private $status;
  
  public function __construct($quantity, $status){
   $this->quantity = $quantity;
   $this->status   = $status;
  }
  
  public function getQuantity(){
   return $this->quantity;
  }
  
  public function getStatus(){
   return $this->status;
  }
  
}

// Here the stockItem is tigtly coupled..  
//Disadvantanges
/*1. If me modify the stockItem class to accept another parameter then we need to change all the calling syntax to change this..
2. Here the product class knows too much about the stockItem sinc we are passing the parameter to the product creation.
3. Unit testing is hard.Since we need to test stockitem before product.*/
class Product {
  private $stockItem;
  private $sku;
  
  public function __construct($sku, $stockQuantity, $stockStatus){
    $this->stockItem  = new StockItem($stockQuantity, $stockStatus);  
    $this->sku        = $sku;
  }
  
  public function getStockItem(){
    return $this->stockItem;
  }
  
  public function getSku(){
    return $this->sku;
  }
}

/*Refacatored Version .*/

<?php 
 
class Product {
  private $stockItem;
  private $sku;
  
  public function __construct($sku, StockItem $stockItem){
    $this->stockItem  = $stockItem;
    $this->sku        = $sku;
  }
  
  public function getStockItem(){
    return $this->stockItem;
  }
  
  public function getSku(){
    return $this->sku;
  }
}

/*Refactored Version with setter
*/
 
/*Here we use setter method to set the entity this allow us to make the it as optional parmater 
since we need not pass the stockitem to the product class.And there is no need for change structure
if in case we need to add extra parameter we just need to add the setter */

<?php 
 
class Product {
  private $stockItem;
  private $sku;
  
  public function __construct($sku){
    $this->sku        = $sku;
  }
  
  public function getStockItem(){
    return $this->stockItem;
  }
  
  public function getSku(){
    return $this->sku;
  }
  
  public function setStockItem(StockItem $stockItem){
    $this->stockItem = $stockItem;
  }
}



?>