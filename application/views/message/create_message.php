Các nhóm chat đã có:
<br>
<?php 
if (isset($messages)) {
	foreach ($messages as $message) {
		echo '<a href="'.base_url('message/show/'.$message['message_id']).'">'.$message['name'].'</a> <a href="'.base_url('message/add_user/'.$message['message_id']).'">Thêm thành viên</a><br/>';
	}
}
?>

<br>
Tạo nhóm chat mới:
<br>

<?php echo validation_errors(); ?>
<?php echo $this->session->flashdata('message'); ?>

<form method="post" action="<?php echo base_url('message/create'); ?>">
	Môn học: <input type="text" name="subject" />
	<br>
	Tên nhóm: <input type="text" name="name" />
	<br>
	<input type="submit" name="submit" value="Tạo" />
</form>