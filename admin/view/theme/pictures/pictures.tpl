<?php echo $header; ?>
<div id="content">

  <?php if ($warning) { ?>
  <div class="warning"><?php echo $warning; ?></div>
  <?php } ?> 
  <?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
  <?php } ?>
   
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

  <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" />Product </h1>
	  
      <div class="buttons">
      	<a onclick="$('#form').submit();" class="button">
		<span>Save</span>
		</a>
        <a href="<?php echo  $cancel;?>" class="button">
		<span>Cancel</span>
		</a>
	  </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general">General</a></div>
		
		<table class="form">
          <tr>
			  <td>Banner:(width=980px)</td>
			  <td valign="top"><input type="hidden" name="image0" value="<?php echo isset($img0['url']) ? $img0['url'] : ''; ?>" id="image0" />
				<img onclick="select_image('image0');" src="<?php echo isset($img0['url']) ? HTTP_HOME.'uploads/images/'.$img0['url'] : ''; ?>"  class="image image0" data-href="image0" />
			   </td>
			</tr>
			<tr>
			  <td>Side Image 1:(width=260)</td>
			  <td valign="top"><input type="hidden" name="image1" value="<?php echo isset($img1['url']) ? $img1['url'] : ''; ?>" id="image1" />
				<img onclick="select_image('image1');" src="<?php echo isset($img1['url']) ? HTTP_HOME.'uploads/images/'.$img1['url'] : ''; ?>"  class="image" data-href="image1" />
			   </td>
			</tr>
			<tr>
			  <td>Side Image 2:(width=260)</td>
			  <td valign="top"><input type="hidden" name="image2" value="<?php echo isset($img2['url']) ? $img2['url'] : ''; ?>" id="image2" />
				<img onclick="select_image('image2');" src="<?php echo isset($img2['url']) ? HTTP_HOME.'uploads/images/'.$img2['url'] : ''; ?>"  class="image" data-href="image2" />
			   </td>
			</tr>
			<tr>
			  <td>Side Image 3:(width=260)</td>
			  <td valign="top"><input type="hidden" name="image3" value="<?php echo isset($img3['url']) ? $img3['url'] : ''; ?>" id="image3" />
				<img onclick="select_image('image3');" src="<?php echo isset($img3['url']) ? HTTP_HOME.'uploads/images/'.$img3['url'] : ''; ?>"  class="image" data-href="image3" />
			   </td>
			</tr>
			<tr>
			  <td>Side Image 4:(width=260)</td>
			  <td valign="top"><input type="hidden" name="image4" value="<?php echo isset($img4['url']) ? $img4['url'] : ''; ?>" id="image4" />
				<img onclick="select_image('image4');" src="<?php echo isset($img4['url']) ? HTTP_HOME.'uploads/images/'.$img4['url'] : ''; ?>"  class="image" data-href="image4" />
			   </td>
			</tr>
		</table>
	
    </div>

  </div>
  	</form>
 
</div>
<style>
.content img{ max-width:180px;}
.content .image0{ max-width:600px;}
</style>

<!--select image-->
<script type="text/javascript">
var image_category_url="<?php echo HTTP_HOME.'uploads/images/';?>";
function select_image(element){
	window.open("./view/javascript/ckeditor/elfinder/elfinder_select_image.php?token=<?php echo $token;?>&image="+element,"newwindow","height=500,width=1100,top=" + (window.screen.availHeight-30-500)/2 +",left=" + (window.screen.availWidth-10-1100)/2 +",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no") ;
}
function image_callback(file,name){
	file=file.replace(/.*?uploads\/images\//,'');
	$('[name="' + name+'"]').val(file);
	$('[data-href="'+name+'"]').attr('src', image_category_url+file);
}
</script>

<?php echo $footer; ?>