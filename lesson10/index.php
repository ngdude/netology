<?php
  require_once "Products.php";
  require_once __DIR__."/class/user.php";
  require_once __DIR__."/class/student.php";
  require_once __DIR__."/class/MyNews.php";
  require_once __DIR__."/class/ClassFurniture.php";


$vegitables = new Vegetables ('Картошка', 'кг',60,0);
$drinks = new Drinks ('Балтика 9','банок',100,10,true);
$cookie = new Cookies ('Юбилейное','пачек',35,10,false);


$vegitables->Render(9);
$vegitables->Render(15);
$drinks->Render(3);
$drinks->Render(9);
$cookie->Render(10);
$cookie->Render(15);

echo "class user.php</br>";

    $user5->getUserInfo();
    $user5->getCheakAdmins();
echo "</br>";
echo "</br>";

 echo "class student.php</br>";
    $student1->setUniversity('Mgapi');
    $student1->getStudent();
    $student1->setPayType(1);
    $student2->setUniversity('Mgapi');
    $student2->setPayType(2);
    $student2->getStudent();

echo "</br>";

echo "class MyNews.php</br>";
    $news1->setAsHot();
    $news1->setCategory('Бокс');
    $news1->getNews();
echo "</br>";

echo "class ClassFurniture.php</br>";
    $furniture1->getFurn();
    $furniture1->getFurnExtended();
    $furniture1->setPrice('600');
    $furniture1->setAmount(5);
    $furniture1->getFurn();
echo "</br>";

echo "Новость </br>";
echo $news1->getNewstitle()."</br>";
echo "Была создана </br>";
echo $news1->getNewsDate()."</br>";

$news1->getNews();
$news2->getNews();
$news3->getNews();
$news4->getNews();
$news5->getNews();





?>
