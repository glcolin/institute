<?php echo $header; ?>
<div id="content">

  <?php if ($warning) { ?>
  <div class="warning"><?php echo $warning; ?></div>
  <?php } ?> 
   
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
  <input type="hidden" name="item_id" value="<?php echo isset($this->request->get['video_id'])?$this->request->get['video_id']:""?>" />
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" />视频详细 </h1>
	  
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
			<td><input size="80" name="item_title" id="item_title" value="<?php echo isset($video_info['title']) ? $video_info['title'] : ''; ?>"/>
			</td>
		  </tr>
		  <tr>
			<td> 视频:</td>
			<td><input type="hidden" name="video" id="video" value="<?php echo isset($video_info['url']) ? $video_info['url'] : ''; ?>"/>
			<img onclick="select_image('video');" src="<?php echo (isset($video_info['url']) and !empty($video_info['url'])) ? HTTP_HOME.'uploads/video.jpg' : HTTP_HOME.'uploads/novideo.jpg'; ?>"  class="image" data-href="video" />
			<p id="videoTitle"><?php echo isset($video_info['url']) ? $video_info['url'] : 'No Video'; ?></p>
			</td>
		  </tr>
		  <tr>
			<td> 课堂种类:</td>
			<td>
			<select name="item_category">
				<?php if(!isset($video_info['video_cat_id'])){
					$video_info['video_cat_id'] = 1;
				} ?>		
				<?php $c = 1; ?>
				<?php foreach($totalCategories as $category){ ?>
					<option <?php echo ($video_info['video_cat_id']==$c)?'selected="selected"':''; ?> value="<?php echo $c++?>" ><?php echo $category['title']; ?></option>
				<?php } ?>
			</select>
			</td>
		  </tr>
		  <tr>
			<td> 视频介绍:</td>
			<td><textarea name="item_content" id="item_content"><?php echo isset($video_info['content']) ? $video_info['content'] : ''; ?></textarea>
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
var image_category_url="<?php echo HTTP_HOME.'uploads/videos/';?>";
function select_image(element){
	window.open ("./view/javascript/ckeditor/elfinder/elfinder_select_video.php?token=<?php echo $token;?>&image="+element,"newwindow","height=500,width=1100,top=" + (window.screen.availHeight-30-500)/2 +",left=" + (window.screen.availWidth-10-1100)/2 +",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no") ;
}
function image_callback(file,name){
	file=file.replace(/.*?uploads\/videos\//,'');
	$('[name="' + name+'"]').val(file);
	$('#videoTitle').text(file);
	$('[data-href="'+name+'"]').attr('src', '<?php echo HTTP_HOME;?>uploads/video.jpg');
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