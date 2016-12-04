<?php
  class User {
    public $name;
    public $login;
    private $password;
    public $lastenter = 0 ;
    public $description;
    private $birth;

    public function __construct($name, $login, $password ,$description, $birth) {
      $this->name = $name;
      $this->login = $login;
      $this->password = $password;
      $this->description = $description;
      $this->birth = $birth;
}
    public function getUserInfo() {
        echo "name: $this->name, login: $this->login, about: $this->description, birth: $this->birth. </br>";
    }
    public function setPassword($pass) {
        $this->password = $pass;
        echo "user:$this->name password has been changed to $this->password </br>";
    }
    public function getUserPassword() {
        echo "user:$this->name pass:$this->password</br>";
    }
    public function getLastEnter() {
        if ($this->lastenter == 0) {
            echo "user:$this->name was never logged in</br>";
        }
        else {echo "user:$this->name was logged in at $this->lastenter </br>";} }
    public function setLastEnter($now) {
        $this->lastenter = $now;
        echo $this->lastenter."</br>";
    }

}

$user1 = new User ('Vasya','Vas999','Pass123','blabla','12-04-90');
$user2 = new User ('Peta','peppy93','Qwerty321','blabla','15-04-93');
$user3 = new User ('Andrey','Anny1','zXas123','blabla','11-09-91');
$user4 = new User ('Kate','Cake2016','Ozsd123Ad','blabla','19-01-92');
$user5 = new User ('Karl','Kaaaarl','Df3Sf394','blabla','19-04-93');

?>
