<div class="col-md-2">
	<div id="log-group" class="conversation"></div>
	<textarea id="content-group"></textarea>
</div><!-- /.col-md-2 -->

<style>
.conversation {border-radius:5px;
        margin-top:10px;
		padding:5px;
		border: 1px solid gray;
        height:300px;
		width:100%;
		overflow:auto; }
</style>

<script>
var group_id = <?php echo(isset($group_chat_id) ? $group_chat_id : 0)?>;
var last_group_id = 0;

var url_get_message = "<?php echo base_url('message/get'); ?>";

function getMessage() {
	$.getJSON(url_get_message+'/'+group_id+'/'+last_group_id, function( data ) {
		console.log(data);
		data.forEach(function(entry) {
			buffer = "<b><i>" + entry.username + ":</i></b> " + entry.content;
			object = document.getElementById("log-group");
			object.innerHTML += "<br/>" + buffer;
			object.scrollTop = object.scrollHeight;
			last_group_id = entry.message_content_id;
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
</script>