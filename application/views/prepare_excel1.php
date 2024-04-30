Excel contents - <br>

<?php if($file_content) { $i=0; foreach($file_content as $c) {
    echo $i.'-'.$c.'<br>';
$i++; }
 } ?>

<form name="upload_file" method="post" action="<?=base_url();?>now/upload">
<b>reportTitle</b><br> 
<input type="text" name="reportTitle" value="" placeholder="reportTitle" required><br> 
<b>Single</b><br> 
<input type="text" name="single" value="" placeholder="single" required><br> 
<b>Multi</b><br> 
<input type="text" name="multi" value="" placeholder="multi" required><br> 
<b>pages</b><br>
<input type="text" name="pages" value="" placeholder="pages" required><br>
<b>pub_date</b><br>
<input type="text" name="pub_date" value="" placeholder="pub_date" required><br>
<b>content</b><br>
<input type="text" name="content" value="" placeholder="content" required><br>
<b>summary</b><br>
<input type="text" name="summary" value="" placeholder="summary" required><br>
<b>publisher</b><br>
<input type="text" name="publisher" value="" placeholder="publisher" required><br>
<b>category</b><br>
<input type="text" name="category" value="" placeholder="category" required><br>
<input type="hidden" name="filename" value="<?php echo $name;?>"><br>
<input type="submit">    
</form>