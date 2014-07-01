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
      <h1><img src="view/image/product.png" alt="" /> 视频观看记录列表 </h1>
	  <div class="buttons">
        <a href="index.php?route=pin/pin" class="button">
		<span>Cancel</span>
		</a>
	  </div>
    </div>
	<div class="content">
      <form>
        <table class="list">
          <thead>
            <tr>
				<td class="right"></td>
				<td class="center" >课堂号码</td>
				<td class="center" >课堂名称</td>
                <td class="center" >开始时间</td>
				<td class="center" >课堂状态</td>
            </tr>
          </thead>
          <tbody>
          <?php if ($records) { ?>
          <?php foreach ($records as $record) { ?>
          	<tr>
			<td class="left">[ <a onclick="return confirm('确定要删除记录?');" href="<?php echo $record['delete']; ?>">Delete</a> ]</td>
            <td class="center"><?php echo $record['courseid']?></td>
			<td class="center"><?php echo $record['course']['title']?></td>
            <td class="center"><?php echo $record['start_time']?></td>
			<td class="center"><?php echo $record['status']?></td>
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