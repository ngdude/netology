<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');

function renderForm($getName, $getAuthor, $getYear){
    echo '
    <form action = "'.$_SERVER['PHP_SELF'].'" method = "GET">
            <input type = "text" name = "name" placeholder="Название книги" value = "'.$getName.'"/>
            <input type = "text" name = "author" placeholder="Автор" value = "'.$getAuthor.'"/>
            <input type = "text" name = "year" placeholder="Год" value = "'.$getYear.'"/>
            <input type = "submit" value = "Поиск" />
            <input type="submit" name="clearfilter" value="Сброс фильтров" />
    </form>
    ';
}

function fromDBtoArray($getName, $getAuthor, $getYear){
$pdo = new PDO("mysql:host=localhost;dbname=global;charset=utf8", "dvertiev" , "neto0708");
$exec1 = $pdo->prepare("select * from books WHERE name like :name and author like :author and year like :year");
$exec1->bindValue(':name', "%$getName%", PDO::PARAM_STR);
$exec1->bindValue(':author', "%$getAuthor%", PDO::PARAM_STR);
$exec1->bindValue(':year', "%$getYear%", PDO::PARAM_STR);
$exec1->execute();
$result1 = $exec1->fetchall(PDO::FETCH_ASSOC);
return $result1;
}

?>
