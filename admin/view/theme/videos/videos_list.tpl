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
      <h1><img src="view/image/video.png" alt="" /> 视频管理列表 </h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="button">Add</a><a onclick="delete_action();" class="button">Delete</a></div>
    </div>
	<div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
      <textarea id="sort_string" name="sort_string" style="display:none;"></textarea>
        <table class="list">
          <thead>
            <tr>
            	<td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
                <td class="center" >Title</td>
				<td class="center" >Category</td>
				<td class="center" >Video</td>
                <td class="right"><?php echo "Action"; ?></td>
            </tr>
          </thead>
          <tbody>
          <?php if ($videos) { ?>
          <?php foreach ($videos as $video) { ?>
          	<tr>
            <td style="text-align: center;">
                <input type="checkbox" name="selected[]" value="<?php echo $video['info']['id']; ?>" />
                <input type="hidden" name="pid" value="<?php echo $video['info']['id']; ?>" />
            </td>
            <td class="center"><?php echo $video['info']['title']?></td>
			<td class="center">
				<?php $c = 1; ?>
				<?php foreach($totalCategories as $category){ ?>
					<?php echo ($video['info']['video_cat_id']==$c)?$category['title']:''; ?>
					<?php $c++; ?>
				<?php } ?>
			</td>
			<td class="center"><?php echo $video['info']['url']?></td>
            <td class="right"><?php foreach ($video['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>
            </tr>
          <?php }?>
          <?php }?>
          </tbody>
        </table>
      </form>
     </div>           
  </div>
</div>

<script src="view/javascript/json.js"></script>
<script type="text/javascript">
$("#form tbody").sortable({
	items: "tr",
	stop: function(){
		save_sort();
	},
	placeholder: "ui-state-highlight",
	helper: "clone",
	tolerance: "pointer"
});

function save_sort(){
	var sort_arr=[];
	$('#form tbody [name="pid"]').each(function(){
		sort_arr.push($(this).val());
	})
	$("#sort_string").val(JSON.encode(sort_arr));
	
	$.ajax({
		type: 'post',
		url : 'index.php?route=videos/videos/saveSort',
		dataType : "html",
		data: {
			   sort_string : JSON.encode(sort_arr)
		},
		success: function (data) {

		}
	});
}

function delete_action(){
	if($('#form tbody input[type="checkbox"]:checked').size()>0){
		$('form').submit();
	}
	else{
		alert("Please choose an item to delete.");
	}
}
</script>
 
<?php echo $footer; ?>