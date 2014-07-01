<?php echo $header; ?>
<div id="content">

	<?php if ($warning) { ?>
		<div class="warning"><?php echo $warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	
	<div class="box">
		<div class="heading">
		<h1><img src="view/image/product.png" alt="" />相册</h1>
		<div class="buttons">
			<a onclick="change_image_data();$('#form').submit();" class="button">
				<span>Save</span>
			</a>
		</div>
		</div>
		<div class="content">
			<form action="index.php?route=gallery/albums/update" method="post" enctype="multipart/form-data" id="form">
				<ul class="images_holder" >

					<li class="add_new_image" onclick="select_images();"><i class="icon-plus"><font style="font-size:25px;">+</font></i><br /><i style="left: 20%;">(800x600)</i></li>
				</ul>
				<textarea name="banner_string" id="banner_string" style="display:none;"><?php echo $banner_string?></textarea>
			</form>
		</div>           
	</div>
	
</div>

<style>
.images_holder li.add_new_image {
    cursor: pointer;
}
.images_holder li {
    border: 3px solid #DDDDDD;
    float: left;
    height: 100px;
    line-height: 20px;
    list-style: none outside none;
    margin-bottom: 40px;
    margin-right: 20px;
    padding: 0;
    position: relative;
    width: 100px;
}
.images_holder li.add_new_image i {
    left: 41%;
    position: relative;
    top: 33%;
}
.images_holder img {
    border: 0 none;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
	max-height: 100%;
}

.images_holder .icon-plus {
    background-position: -408px -96px;
}

.images_holder li img.icon-remove {
    cursor: pointer;
    position: absolute;
    right: -8px;
    top: -8px;
}
.images_holder .icon-remove {
    background-position: -312px 0;
}

</style>

<script src="<?php echo HTTP_SERVER?>/view/javascript/json.js"></script>
<script type="text/javascript" charset="utf-8">
function select_images(){
	window.open ("./view/javascript/ckeditor/elfinder/elfinder_select_image.html?imagesarea=banner_string","newwindow","height=500,width=1100,top=" + (window.screen.availHeight-30-500)/2 +",left=" + (window.screen.availWidth-10-1100)/2 +",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no") ;
}

function change_image_data(){
	var arr = new Array();
	$(".images_holder li:not(.add_new_image)").each(function(){	
		arr.push($(this).find("img").attr("src"));
	});
	var json_str = JSON.encode(arr);
	$('#banner_string').val(json_str);
}

function remove_image_data(e){
	e.parent().remove();
}

$(".images_holder").sortable({
	items: "li:not(.add_new_image)",
	placeholder: "ui-state-highlight",
	helper: "clone",
	tolerance: "pointer"
});
</script>
<script>
$(document).ready(function(){
	var str = '';
	var arr = JSON.decode('<?php echo $banner_string; ?>');
	for( i=0; i<arr.length; i++ ){
		str += '<li class="ui-state-default"><img src="' + arr[i] + '" /><img onclick="remove_image_data($(this));" src="./view/image/remove.png" border="0" height="15" width="15" class="icon-remove"/></li>';
	}
	$(".images_holder").prepend(str);
});
</script>
 
<?php echo $footer; ?>