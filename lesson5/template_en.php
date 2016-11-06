<html>
    <head>
        <meta charset="utf-8">
        <title>PhoneBook</title>
    </head>
    <body>
<center>
<table cellpadding="15" cellspacing="0" border="1">
<H3>English template</H3>
<tr><td>Name</td><td>SurName</td><td>PhoneNumber</td></tr>
<?php for ($i=0 ; $i < count(getProfiles()) ; $i++): ?>
<tr><td><?=getProfiles()[$i]['name']?>
</td><td><?=getProfiles()[$i]['surname']?>
</td><td><?=getProfiles()[$i]['phonenumber']?></td></tr>
<?php endfor;?>

</center>
</body>
</html>
