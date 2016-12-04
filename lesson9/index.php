<?php
  require_once __DIR__."\class\user.php";
  require_once __DIR__."\class\student.php";
  require_once __DIR__."\class\MyNews.php";
  require_once __DIR__."\class\ClassFurniture.php";

echo "class user.php</br>";
    $user1->getUserInfo();
    $user1->setPassword(12345);
    $user1->getUserPassword();
    $user1->getLastEnter();
    $user1->setLastEnter('12-10-2016');
    $user1->getLastEnter();
echo "</br>";

 echo "class student.php</br>";
    $student1->getStudent();
    $student1->setUniversity('Mgapi');
    $student1->getStudent();
echo "</br>";

echo "class MyNews.php</br>";
    $news1->getNews();
    $news1->setCategory('Бокс');
    $news1->getNews();
echo "</br>";

echo "class ClassFurniture.php</br>";
    $furniture1->getFurn();
    $furniture1->setPrice('600');
    $furniture1->setAmount(5);
    $furniture1->getFurn();
echo "</br>";

/*
$news1->showProfile();
$news2->showProfile();
$news3->showProfile();
$news4->showProfile();
$news5->showProfile();
*/
?>
