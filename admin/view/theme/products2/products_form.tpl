<?php echo $header; ?>
<div id="content">

  <?php if ($warning) { ?>
  <div class="warning"><?php echo $warning; ?></div>
  <?php } ?> 
   
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
  <input type="hidden" name="item_id" value="<?php echo isset($this->request->get['product_id'])?$this->request->get['product_id']:""?>" />
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" />美容课程文章 </h1>
	  
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
			<td> 文章标题:</td>
			<td><input size="80" name="item_title" id="item_title" value="<?php echo isset($product_info['title']) ? $product_info['title'] : ''; ?>"/>
			</td>
		  </tr>
		  <tr>
			<td> 文章内容:</td>
			<td><textarea name="item_content" id="item_content"><?php echo isset($product_info['content']) ? $product_info['content'] : ''; ?></textarea>
			</td>
		  </tr>
		</table>
	
    </div>

  </div>
  	</form>
 
</div>
<style>
.content img{ max-width:300px;}
</style>

<!--select image-->
<script type="text/javascript">
var image_category_url="<?php echo HTTP_HOME.'uploads/images/';?>";
function select_image(element){
	window.open ("./view/javascript/ckeditor/elfinder/elfinder_select_image.php?token=<?php echo $token;?>&image="+element,"newwindow","height=500,width=1100,top=" + (window.screen.availHeight-30-500)/2 +",left=" + (window.screen.availWidth-10-1100)/2 +",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no") ;
}
function image_callback(file,name){
	file=file.replace(/.*?uploads\/images\//,'');
	$('[name="' + name+'"]').val(file);
	$('[data-href="'+name+'"]').attr('src', image_category_url+file);
}
</script>

<!--editor-->
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--

CKEDITOR.replace('item_content', {
	filebrowserBrowseUrl : "elfinder/elfinder.html",
});

//--></script>

<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
//--></script> 
<?php echo $footer; ?>