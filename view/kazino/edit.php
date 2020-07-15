<form action=" <?=$update_url ?>" method="post" enctype="multipart/form-data" >

<label> Name: </label><br>
<input type="text" name="name" value="<?= $kazino['name'] ?>"  required >

<br>

<label>Content:</label><br>
<input type="text" name='content' value="<?= $kazino['content'] ?>" required>

<br>

<label>Bonus Text:</label><br>
<input type="text"  name='bonuses_text' value="<?= $kazino['bonuses_text'] ?>" required>

<br>

<label>Bullet-points:</label><br>


<input type="text" name='bullet_points' value="<?= $kazino['bullet_points'] ?>" required> 

<br>

<label>Casino num:</label><br>
<input type="text" name='casino_number' value="<?= $kazino['casino_number'] ?>" >
<br>
<label>Image:</label><br>
<?php 
echo "<select name='image'>";
echo "<option>{$kazino['image']}</option>";  
foreach($kazina as $kaz){
    
    echo "
    <option value=\"{$kaz['image']}\"> {$kaz['image']} </option> ";
    
    
}

echo "</select>";

?>

<input type="hidden" name="id" value="<?= $kazino['id'] ?>">
<br>
<input type="submit" value="Update" >

</form>

<a href="<?= ROOT_URL ?>"> Back </a>

<style type="text/css">
    input , label{
        margin-bottom:10px;
    }
</style>
