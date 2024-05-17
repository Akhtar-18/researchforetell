<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form" action="<?=base_url();?>import">
<!--    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>-->
    <input type="text" name="filename" value="1">
    <div class="form-group">
        <input type="radio" value="0" name="category">0&nbsp;
    <?php if($categories) { foreach($categories as $category) { ?>
        <input type="radio" value="<?php echo $category['id'];?>" name="category"> <?php echo $category['id'];?> - <?php echo $category['categoryName'];?> &nbsp;
        <?php }} ?>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>
