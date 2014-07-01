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
      <h1><img src="view/image/product.png" alt="" /> 帐号列表 </h1>
    </div>
	<div class="content">
      <form>
        <table class="list">
          <thead>
            <tr>
				<!--<td class="right"></td>-->
				<td class="center" >学生姓名</td>
				<td class="center" >学生电话号码</td>
				<td class="center" >学生电子邮箱</td>
                <td class="center" >学生九位编号</td>
                <td class="right"></td>
            </tr>
          </thead>
          <tbody>
          <?php if ($pins) { ?>
          <?php foreach ($pins as $pin) { ?>
          	<tr>
			<!--<td class="left">[ <a href="<?php echo $pin['delete']; ?>">Delete</a> ]</td>-->
            <td class="center"><?php echo $pin['name']?></td>
			<td class="center"><?php echo $pin['phone']?></td>
			<td class="center"><?php echo $pin['email']?></td>
            <td class="center"><?php echo $pin['pin']?></td>
            <td class="right">[ <a href="<?php echo $pin['edit']; ?>">Manage</a> ]</td>
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