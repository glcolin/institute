<?php echo $header; ?>
<div id="content">

	<?php if ($warning) { ?>
		<div class="warning"><?php echo $warning; ?></div>
	<?php } ?> 
	<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
   
	<form action="<?php echo $save;?>" method="post" enctype="multipart/form-data" id="form">
		<div class="box">
		<div class="heading">
		  <h1><img src="view/image/product.png" alt="" /><?php echo $ctitle;?></h1>
		  
		  <div class="buttons"><a onclick="$('#form').submit();" class="button">
			<span>Save</span>
			</a>
			</div>
		</div>
		<div class="content">
			<table class="form">
				<tr>
				  <td>Title:</td>
				  <td valign="top"><input type="text" name="title" value="<?php echo $ctitle;?>" size="80"/></td>
				</tr>  
				<tr>
				  <td>Content:</td>
				  <td valign="top"><textarea name="contents" id="contents" cols="120" rows="15"><?php echo $content;?></textarea></td>
				</tr>    
			</table>
		</div>
		</div>	
	</form>
 
</div>

<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
CKEDITOR.replace('contents', {
	filebrowserBrowseUrl : "elfinder/elfinder.html",
});
//--></script>

<?php echo $footer; ?>