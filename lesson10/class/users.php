<?php
  class Users {
    public $name;
    public $login;
    private $password;
    public $lastenter;
    public $description;
    public $birth;

    public function setUser() {}
    public function getUser() {}
    public function setPassword() { }
    public function countUsers() {}
    public function setLastenter() {}
    public function showUsers() {}

}

    class Admins extends UsersP{
        public $adminights
        public function setAdmin() {}
    }

$user1 = new Students ('Vasya','Vas999','Pass123','','blabla','12-04-90')
$user2 = new Students ('Peta','peppy93','Qwerty321','','blabla','15-04-93')
$user3 = new Students ('Andrey','Anny1','zXas123','','blabla','11-09-91')
$user4 = new Students ('Kate','Cake2016','Ozsd123Ad','','blabla','19-01-92')
$user5 = new Students ('Karl','Kaaaarl','Df3Sf394','','blabla','19-04-93')
$user6 = new Admins ('Admin','admin999','123123Df3Sf394','','blabla','19-04-93','true')
?>
