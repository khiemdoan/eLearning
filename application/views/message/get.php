<?php
if (isset($contents)) {
	foreach ($contents as $content) {
		echo $content['time'] . ' - ' . $content['content'] . '<br>';
	}
}
?>