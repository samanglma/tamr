
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>
	
	<h1><?php echo $row->title;?></h1>

	<p><?php echo $row->price;?></p>

	<img width="10%" src="<?php echo base_url();?>uploads/products/<?php echo $row->image;?>" />

	<p><?php echo $row->description;?></p>

</body>
</html>