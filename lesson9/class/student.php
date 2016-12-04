<?php
  class Student {
    public $name;
    public $surname;
    private $sex;
    private $university = 'none';
    public $description;
    private $birth;

    public function __construct($name, $surname, $sex , $description, $birth) {
      $this->name = $name;
      $this->surname = $surname;
      $this->sex = $sex;
      $this->description = $description;
      $this->birth = $birth;
    }

    public function getStudent() {
        echo "Student: $this->name $this->surname, sex:$this->sex,
        about:$this->description, birth:$this->birth university:$this->university</br>";
    }
    public function setUniversity($university) {
        $this->university = $university;
        echo "university was setted to $university</br>";
    }
    public function countStudents() {}
    public function showAverageScore() {}

}

$student1 = new Student ('Vasya','Ivanov','Male','blabla','12-04-90');
$student2 = new Student ('Peta','Ivanov','Male','blabla','15-04-93');
$student3 = new Student ('Andrey','Petrov','Male','blabla','11-09-91');
$student4 = new Student ('Kate','Ivanova','Female','blabla','19-01-92');
$student5 = new Student ('Karl','Krlov','Male','blabla','19-04-93');
?>
