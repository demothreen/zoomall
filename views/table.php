<?= $cont;?>

<?php
while($row = $result->fetch()) {
?>

<table border=1>

    <tr><td>id</td><td>name</td><td>category</td><td>rodent</td>
        <td>amphibia</td><td>reptile</td><td>fish</td><td>cat</td><td>dog</td></tr>
    <tr><td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['category'] ?></td>
        <td><?= $row['rodent'] ?></td>
        <td><?= $row['amphibia'] ?></td>
        <td><?= $row['reptile'] ?></td>
        <td><?= $row['fish'] ?></td>
        <td><?= $row['cat'] ?></td>
        <td><?= $row['dog'] ?></td></tr>

</table>

    <?php
}