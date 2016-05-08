Các thành viên trong nhóm:
<br>
<?php
if (isset($users)) {
	foreach ($users as $user) {
		echo $user['username'] . '<br>';
	}
}
?>

<form method="post" action="<?php echo base_url('message/add_user/'.$message_id) ?>">
	Tên thành viên: <input type="text" name="name" />
	<br>
	<input type="submit" name="submit" value="Thêm" />
</form>