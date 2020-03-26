<?php
/**
 *
 */
class Configuration
{
  private $showNavBar = true;
  private $soft_name = "Reduan Masud Software Ltd.";

  function __construct()
  {
    // code...
  }

  public function is_navbar_visible()
  {
    if($this->showNavBar){
        return true;
    } else{
        return false;
    }
  }
  public function hideNavBar()
  {
    $this->showNavBar = false;
  }


}


 ?>
