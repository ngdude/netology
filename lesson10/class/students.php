<?php
  class Students {
    public $name;
    public $surname;
    public $sex;
    public $university;
    public $description;
    public $birth;

    public function setStudent() {}
    public function getStudent() {}
    public function showAllStudents() {}
    public function countStudents() {}
    public function showAverageScore() {}
}

        class CommStudents extends Students{
            private $paid
                }
        class BudgetStudents extends Students{
            private $budget
        }





$students1 = new CommStudents ('Vasya','Ivanov','Male','MGAPI','blabla','12-04-90','10000')
$students2 = new CommStudents ('Peta','Ivanov','Male','MAI','blabla','15-04-93','10000')
$students3 = new CommStudents ('Andrey','Petrov','Male','Mguki','blabla','11-09-91','10000')
$students4 = new BudgetStudents ('Kate','Ivanova','Female','MGAPI','blabla','19-01-92','true')
$students5 = new BudgetStudents ('Karl','Krlov','Male','MGAPI','blabla','19-04-93','true')

?>
