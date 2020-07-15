<table>
<thead>
    <th> Id </th>
    <th> Picture </th>
    <th> Name </th>
    <th> Content </th> 
    <th> Bonuses </th>
    <th> Bullet Points </th>
    <th> Casino Nb </th>
    <th> Edit </th>
    <th> Delete</th>
</thead>

<tbody>
<?php
foreach($kazino as $row){
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td><img src=\"{$row['image']}\"></td>";
   
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['content']}</td>";
    echo "<td>{$row['bonuses_text']}</td>";
    echo "<td>{$row['bullet_points']}</td>";
    echo "<td>{$row['casino_number']}</td>";
    echo "<td><a href='".ROOT_URL."kazino/edit/{$row['id']}'> Edit </a></td>";
    echo "<td><a href='".ROOT_URL."kazino/delete/{$row['id']}' onclick='check()'> Delete </a> </td>";
    echo "</tr>";


}

?>


</tbody>
</table>
<br>

<a href="<?= ROOT_URL . 'kazino/create' ?>"> Create </a>
<br><br>
<label>Go to Select to chose Number One Casinos</label>
<a href="<?= ROOT_URL . 'kazino/select' ?>"> Select </a>

<?php

echo "<br>";
$str = 'Not Good';
if (($timestamp = strtotime($str)) === true) {
  echo "The string ($str) is bogus";
} else {
 // $img_name = time(). $_FILES['image']['name'];
  //echo $img_name;
  echo "$str == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}

?>
<script>
  function check(){

    if( !confirm('Are you sure ?') ){
      event.stopPropagation();
      event.preventDefault();
    } 

  }
</script>

<style type="text/css">
  table, td, th {
  border : 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
div {
  width: 40%;
  height:300px;
}
.checked{
  float: right;
  margin-right:700px;
}
</style>