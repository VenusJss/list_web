<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	<?php
		if(empty($_GET['id'])){
			header('location:index.php?error=Phải truyền mã để sửa');
		}
		$id = $_GET['id'];
		include '../menu.php';
		require '../connect.php';
		$sql = "select * from manufacture 
		where id = '$id'";
		$result = mysqli_query($connect, $sql);
		$number_rows = mysqli_num_rows($result);
		if($number_rows === 1){
		$each = mysqli_fetch_array($result);
	?>
<form method="post" action="process_update.php">
	<fieldset>
		<legend>Thêm nhà sản xuất</legend>
		<input type="hidden" name="id" value="<?php echo $each['id'] ?>">		
		Tên:
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>
		Địa chỉ:
		<textarea name="address"><?php echo $each['address'] ?></textarea>
		<br>
		Điện thoại:
		<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
		<br>
		Ảnh:
		<input type="text" name="photo" value="<?php echo $each['photo'] ?>">
		<br>
		<button>SỬA</button>
	</fieldset>
</form>
<?php }else{ ?>
<h2><em>Không tìm thấy theo mã này</em></h2>
<?php } ?>
<?php
mysqli_close($connect);
?>
</body>
</html>