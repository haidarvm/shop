<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('admin/product/do_upload');?>

<input type="file" name="filed" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>