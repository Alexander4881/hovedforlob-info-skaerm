<?php
include('./db/db.php');

/**
 *
 */
class DB extends mysqli
{
  // Single instance of all self shared among all instances
  private static $instance = null;

  // DB Connection Vars
  private $user = DB_USER;
  private $pass = DB_PASSWORD;
  private $dbName = DB_NAME;
  private $dbHost = DB_HOST;

  // This method must be static.
  // Must return an instance of the object.
  // If the object does not exicst.
  public static function getInstance()
  {
      if (!self::$instance instanceof self)
      {
        self::$instance = new self;
      }
      return self::$instance;
  }

  // The clone and wakeup methods,
  // prevents instantiation of copies,
  // of the Singleton class.
  // Then aliminating the possibility of the dup objects.
  public function _clone()
  {
    trigger_error('Clone is not allowed.', E_USER_ERROR);
  }
  public function _wakeup()
  {
    trigger_error('Deserializing is not allowed.', E_USER_ERROR);
  }

  private function _construct()
  {
    parent::_construct($this->$dbHost, $this->$user, $this->$pass, $this->$dbName);
    if (mysqli_connection_error())
    {
      exit('Connect Error (' . mysqli_connection_errno() . ') ' . mysqli_connection_error());
    }
    parent::set_charset('utf-8');
  }

  public function dbquery($query)
  {
    if ($this->query($query))
    {
      return true;
    }
  }

  public function get_result($query)
  {
    $result = $this->query($query);
    if ($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      return $row;
    }
    else
    {
      return null;
    }
  }
}
 ?>
