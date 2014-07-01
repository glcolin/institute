<?php echo $header; ?>
<div id="content">

  <?php if ($warning) { ?>
  <div class="warning"><?php echo $warning; ?></div>
  <?php } ?> 
   
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
  <input type="hidden" name="item_id" value="<?php echo isset($this->request->get['category_id'])?$this->request->get['category_id']:""?>" />
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" />课程分类详细 </h1>
	  
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
			<td> 视频标题:</td>
			<td><input size="80" name="item_title" id="item_title" value="<?php echo isset($category_info['title']) ? $category_info['title'] : ''; ?>"/>
			</td>
		  </tr>
		 <tr>
			<td> 课程价格:</td>
			<td><input size="20" name="item_price" id="item_price" value="<?php echo isset($category_info['price']) ? $category_info['price'] : ''; ?>"/>
			</td>
		  </tr>
		  <tr>
			<td> 视频介绍:</td>
			<td><textarea name="item_content" id="item_content"><?php echo isset($category_info['content']) ? $category_info['content'] : ''; ?></textarea>
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