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
      <h1><img src="view/image/category.png" alt="" /> 课堂分类管理列表 </h1>
      <!--<div class="buttons"><a href="<?php echo $insert; ?>" class="button">Add</a><a onclick="delete_action();" class="button">Delete</a></div>-->
    </div>
	<div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
      <textarea id="sort_string" name="sort_string" style="display:none;"></textarea>
        <table class="list">
          <thead>
            <tr>
            	<!--<td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>-->
                <td class="center" >Title</td>
				<td class="center" >Price</td>
                <td class="right"><?php echo "Action"; ?></td>
            </tr>
          </thead>
          <tbody>
          <?php if ($categorys) { ?>
          <?php foreach ($categorys as $category) { ?>
          	<tr>
            <!--<td style="text-align: center;">
                <input type="checkbox" name="selected[]" value="<?php echo $category['info']['id']; ?>" />
                <input type="hidden" name="pid" value="<?php echo $category['info']['id']; ?>" />
            </td>-->
            <td class="center"><?php echo $category['info']['title']?></td>
			<td class="center"><?php echo $category['info']['price']?></td>
            <td class="right"><?php foreach ($category['action'] as $action) { ?>
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
 
<?php echo $footer; ?>