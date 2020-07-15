<table>
<thead>

<th></th>
<th></th>
<th></th>

</thead>
<tbody>

<form action="<?= $insert_url ?>" method="post">
<?php
    
foreach($result as $row){
    echo "<tr>";
    echo "<td>{$row['name']}</td>";
    echo "<td> <img src=\"../{$row['image']}\" > </td>" ;
    echo "<td><input type='number' name='casino_number[]' value='{$row['casino_number']}'> </td>";
    echo "<td><input type='checkbox' name='id' value='{$row['id']}'> </td>";
    echo "</tr>";
} 
    
?>
<input type='submit' value='Submit checked data' class='checked' name="save">
</form>

</tbody>
</table>

<a href="<?= ROOT_URL ?>"> Back </a>

<style type="text/css">
  table, td, th {
  border : 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
</style>