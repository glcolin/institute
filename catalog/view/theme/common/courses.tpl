<?php echo $header;?>
		
		<div class="content">
			
			<div class="left">
				
				<div class="courselist">
					<h3>Course List</h3>
					<?php $i = 0;?>
					<?php foreach($courses as $course){ ?>
						<p><a href="javascript:void(0);" class="link<?php echo $i++;?>" onclick="clickLink($(this));"><?php echo $course['title'];?></a></p>
					<?php } ?>
					<div>&nbsp;</div>
				</div>

				<p>&nbsp;</p>
				
				<img src="catalog/view/images/trademark.jpg" border="0" width="120" style="margin-left:70px;margin-bottom:50px;border:0px !important;" />
				
				<div style="clear:both;"></div>
				
			</div><!-- left -->
			
			<div class="right">
			</div><!-- right -->
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>

	<?php $j = 0;?>
<?php foreach($courses as $course){ ?>
	<div id="clink<?php echo $j++;?>" style="display:none;">
		<?php echo htmlspecialchars_decode($course['content']);?>
	</div>
<?php } ?>
	
<script>
function clickLink(v){
	var className = v.attr('class');
	$('.right').html($('#c'+className).html());
	return false;
}

$(document).ready(function(){

	var pathname = $(location).attr('href');
	var param_array = pathname.split('&');
	var param = param_array[1];
	
	if(typeof param == 'undefined'){
		$('.right').html($('#clink0').html());
	}else{
		$('.right').html($('#clink'+param).html());
	}
	
});
</script>

<?php echo $footer;?>

