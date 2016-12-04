<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');

function render_form($get_name, $get_author, $get_year){
    echo '
    <center><form action = "'.$_SERVER['PHP_SELF'].'" method = "GET">
            <input type = "text" name = "name" placeholder="Название книги" value = "'.$get_name.'"/>
            <input type = "text" name = "author" placeholder="Автор" value = "'.$get_author.'"/>
            <input type = "text" name = "year" placeholder="Год" value = "'.$get_year.'"/>
            <input type = "submit" value = "Поиск" />
    </form></center>
    ';
}

function render_page($get_name, $get_author, $get_year){
echo '
<style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }

    table th {
        background: #eee;
    }
</style>
';

$name = '\'%'.$get_name.'%\'';
$author = '\'%'.$get_author.'%\'';
$year = '\'%'.$get_year.'%\'';

$pdo = new PDO("mysql:host=localhost;dbname=global;charset=utf8", "dvertiev" , "neto0708");
$sql1 = "select * from books WHERE name like $name and author like $author and year like $year";

$exec1 = $pdo->query($sql1);
$exec1->bindValue(':name', $name, PDO::PARAM_STR);
$exec1->bindValue(':author', $name, PDO::PARAM_STR);
$exec1->bindValue(':year', $name, PDO::PARAM_STR);
$result1 = $exec1->fetchall(PDO::FETCH_ASSOC);

echo '<center><table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>';
foreach ($result1 as $row) {
    echo "<tr><td>".$row["name"]."</td>"."<td>".$row["author"]."</td><td>".
    $row["year"]."</td><td>".$row["genre"]."</td><td>".$row["isbn"]."</td></tr>";
}
echo "</table></center>";
}

 ?>
