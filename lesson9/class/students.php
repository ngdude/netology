<?php
  class Students {
    public $name;
    public $surname;
    public $sex;
    public $university;
    public $description;
    public $birth;

    }
    public function setStudent() {}
    public function getStudent() {}
    public function showAllStudents() {}
    public function countStudents() {}
    public function showAverageScore() {}

}

$students1 = new Students ('Vasya','Ivanov','Male','MGAPI','blabla','12-04-90')
$students2 = new Students ('Peta','Ivanov','Male','MAI','blabla','15-04-93')
$students3 = new Students ('Andrey','Petrov','Male','Mguki','blabla','11-09-91')
$students4 = new Students ('Kate','Ivanova','Female','MGAPI','blabla','19-01-92')
$students5 = new Students ('Karl','Krlov','Male','MGAPI','blabla','19-04-93')

?>
