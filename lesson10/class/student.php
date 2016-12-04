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

    class StudentExtended extends Student{
        private $paytype = 0 ;
        public function getPayType(){
            if ($this->$paytype == 1) { return "поступил на бюджет</br>";}
            elseif ($paytype == 2) { return "поступил на платное</br>";}
            else {return "пока ещё не перевели</br>";}
        }
        public function setPayType($paytype){
            $this->paytype = $paytype;
            if ($paytype == 1) {echo "$this->name поступил на бюджет</br>";}
            elseif ($paytype == 2) {echo "$this->name поступил на платное</br>";}
            else {echo "$this->name пока ещё не перевели</br>";}
        }
        public function getStudentExtended() {
            echo "Student: $this->name $this->surname, sex:$this->sex,
            about:$this->description, birth:$this->birth university:$this->university</br>, Форма оплаты: $this->getPayType</br>";

    }

}

$student1 = new StudentExtended ('Vasya','Ivanov','Male','blabla','12-04-90');
$student2 = new StudentExtended ('Peta','Ivanov','Male','blabla','15-04-93');
$student3 = new StudentExtended ('Andrey','Petrov','Male','blabla','11-09-91');
$student4 = new StudentExtended ('Kate','Ivanova','Female','blabla','19-01-92');
$student5 = new StudentExtended ('Karl','Krlov','Male','blabla','19-04-93');
?>
