<?php echo $header;?>
		
		<div class="content">
		
			<div class="payment_form">
			
			<h3>Confirm Infomation</h3>

			<p>Your online course pin number is <b style="color:#D00;font-size:125%;"><?php echo $pin;?></b>,我们将会将此号码在您完成付钱后发送到你的电子邮箱和手机里,但有时由于网络问题,有也会存在接收的不到的可能性,所以请你将这个号码复制到你的电脑或用纸和笔抄下来.当你确认你以下的信息并成功完成付钱手续之后,您的课堂编号号码将会被激活并马上可以使用来观看在线视频.请选择用Paypal或支付宝任何一种付费方式来完成付费.</p>
			
				<table>
					
					<tr>
						<td class="first">Your Name:</td>
						<td class="second"><?php echo $name;?></td>
					</tr>
										
					<tr>
						<td class="first">Your Phone Number:</td>
						<td class="second"><?php echo $phone;?></td>
					</tr>

					<tr>
						<td class="first">Your Email:</td>
						<td class="second"><?php echo $email;?></td>
					</tr>

					<tr>
						<td class="first">Select Course:</td>
						<td class="second"><?php echo $course['title'];?></td>
					</tr>
					
					<tr>
						<td class="first">Total:</td>
						<td class="second"><b style="color:#D00;">$<span class="price"><?php echo $course['price'];?></span></b></td>
					</tr>
					
					<tr>
						<td class="first">&nbsp;</td>
						<td class="second"><img onclick="$('#paypal_form').submit();" style="margin:0;padding:0;cursor:pointer;" src="catalog/view/images/paypal.png" width="100" height="50" border="0" />&nbsp;&nbsp;&nbsp;&nbsp;<img onclick="$('#alipay_form').submit();" style="margin:0;padding:0;cursor:pointer;" src="catalog/view/images/alipay.png" width="100" height="50" border="0" /></td>
					</tr>
					
				</table>
			
			</div>
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>
	
 <!-- Begin PayPal Button -->
<form style="display:none;" action="https://www.paypal.com/cgi-bin/webscr" method="post" class="paypal_btn" id="paypal_form"> 
	<input type="hidden" value="utf-8" name="charset"> 
	<input type="hidden" name="cmd" value="_cart"> 
	<input type="hidden" name="upload" value="1"> 
	<input type="hidden" name="business" value="BTRYAC6FL36G6">
	<input type="hidden" name="currency_code" value="USD"> 
	<input type="hidden" name="item_name_1" value="<?php echo $course['title'];?>"> 
	<input type="hidden" name="amount_1" value="<?php echo $course['price'];?>"> 
	<input type="hidden" name="quantity_1" value="1"> 
	<input TYPE="hidden" name="return" value="http://hyinstitute.com/">
	<input TYPE="hidden" name="cancel_return" value="http://hyinstitute.com/index.php?route=common/payment">
	<input type="hidden" name="notify_url" value="http://hyinstitute.com/index.php?route=common/payment/paypal_ipn"> 
	<input type="hidden" name="custom" value="<?php echo $name;?>,<?php echo $phone;?>,<?php echo $email;?>,<?php echo $courseid;?>,<?php echo $pin;?>">
	<input style="display:none;" type="image" src="images/paypal_btn.jpg" width="150" height="30" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"> 
</form>
<!-- End PayPal Button -->

 <!-- Begin alipay Button -->
<form style="display:none;" action="./alipay/alipayapi.php" method="post" class="paypal_btn" id="alipay_form"> 
	<input type="hidden" name="WIDout_trade_no" value="<?php echo $pin;?>"> 
	<input type="hidden" name="WIDsubject" value="<?php echo $course['title'];?>"> 
	<input type="hidden" name="WIDprice" value="<?php echo $course['price'];?>">
	<input type="hidden" name="WIDreceive_name" value="<?php echo $name;?>">
	<input type="hidden" name="WIDreceive_mobile" value="<?php echo $phone;?>">
	<input type="hidden" name="WIDbody" value="<?php echo $email;?>">
	<input type="hidden" name="WIDreceive_zip" value="<?php echo $courseid;?>">
	
</form>
<!-- End alipay Button -->



<?php echo $footer;?>