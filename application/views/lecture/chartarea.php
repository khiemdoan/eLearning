<div class="col-md-2">
	<label class="bh_label">Team chat</label>
	<div id="log-group" class="conversation"></div>
	<textarea id="content-group" placeholder="Type here ..."></textarea>
</div><!-- /.col-md-2 -->

<div class="col-md-2">
	<label class="bh_label">Class chat</label>
	<div id="log-class" class="conversation"></div>
	<textarea id="content-class" placeholder="Type here ..."></textarea>
</div><!-- /.col-md-2 -->

<script>
var group_id = <?php echo(isset($group_chat_id) ? $group_chat_id : 0)?>;
var class_id = <?php echo(isset($class_chat_id) ? $class_chat_id : 0)?>;
var last_group_id = 0;
var last_class_id = 0;

var url_get_message = "<?php echo base_url('message/get'); ?>";
var url_get_class_message = "<?php echo base_url('message/get_class_message'); ?>";

function getMessage() {
	$.getJSON(url_get_message+'/'+group_id+'/'+last_group_id, function( data ) {
		data.forEach(function(entry) {
			buffer = "<b><i>" + entry.username + ":</i></b> " + entry.content;
			object = document.getElementById("log-group");
			object.innerHTML += "<br/>" + buffer;
			object.scrollTop = object.scrollHeight;
			last_group_id = entry.message_content_id;
		});
	});
	$.getJSON(url_get_class_message+'/'+class_id+'/'+last_class_id, function( data ) {
		data.forEach(function(entry) {
			buffer = "<b><i>" + entry.username + ":</i></b> " + entry.content;
			object = document.getElementById("log-class");
			object.innerHTML += "<br/>" + buffer;
			object.scrollTop = object.scrollHeight;
			last_class_id = entry.message_content_id;
		});
	});
}

setInterval(getMessage, 1000);

$('#content-group').keyup(function(e){	
    if(e.keyCode == 13)
    {
		data = {
			message_id: <?php echo(isset($group_chat_id) ? $group_chat_id : 0)?>,
			content: $('#content-group').val()
		}
		$('#content-group').val('');
        $.post("<?php echo base_url('message/send'); ?>", data);
    }
});
$('#content-class').keyup(function(e){
    if(e.keyCode == 13)
    {
        data = {
			class_id: <?php echo(isset($class_chat_id) ? $class_chat_id : 0)?>,
			content: $('#content-class').val()
		}
		$('#content-class').val('');
        $.post("<?php echo base_url('message/send_class_message'); ?>", data);
    }
});
</script>