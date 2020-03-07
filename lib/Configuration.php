<?php
/**
 *
 */
class Configuration
{
  private $showNavBar = true;

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

  public function hello_world()
  {
    echo "Hello WOrld";
  }
}


 ?>
