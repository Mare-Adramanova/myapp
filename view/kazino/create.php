<form action="<?= $insert_url ?>" method="post" enctype="multipart/form-data">

<label>Image:</label><br>
<input type="file" name="image">
<br>

<label> Name: </label><br>
<input type="text" name="name" required >

<br>

<label>Content:</label><br>
<input type="text" name='content' required >

<br>

<label>Bonus Text:</label><br>
<input type="text"  name='bonuses_text' required >

<br>

<label>Bullet-points:</label><br>
<input type="text" name='bullet_points' required>

<br>

<label>Casino num:</label><br>
<input type="number" name='casino_number' required >

<br>
    
<input type="submit" value="Insert" name="insert">

</form>

<a href="<?= ROOT_URL ?>"> Back </a>

<style type="text/css">
    input , label{
        margin-bottom:10px;
    }
</style>

