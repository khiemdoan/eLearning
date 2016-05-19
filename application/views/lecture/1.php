<div class="col-md-8">
	
<div id="content" style=" width: 100%; height: 500px;">
	<object type="application/x-shockwave-flash" id="FlashPresentation" width="95%" height="100%" name="FlashPresentation" style="position:absolute" wmodefixed="true" wmode="" data="<?php echo base_url('baigiang/bai1/movie.swf');?>" data="movie.swf" >
		<param name="allowscriptaccess" value="sameDomain">
		<param name="allowfullscreen" value="true">
		<param name="allowFullScreenInteractive" value="true">
		<param name="salign" value="lt">
		<param name="wmode" value="opaque">
		<param name="flashvars" value="id=FlashPresentation&amp;resume=">
	</object>
</div>
<script>
	(function(){
		var ldr = new ispring.presenter.loader.FlashPresentationLoader();
		ldr.load("movie.swf", "content", "FlashPresentation", undefined, undefined);
	})();
</script>
<a href="<?php echo base_url('baigiang/bai1/dieuphoi.html'); ?>">baigiang</a>
</div><!-- /.col-md-8 -->