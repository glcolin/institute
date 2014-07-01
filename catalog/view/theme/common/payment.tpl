<?php echo $header;?>
		
		<div class="content">
		
			<div class="payment_form">
			
			<h3>购买课堂表格</h3>

			<p>请填写以下表格来购买您所需要的课堂,每个空格必填.</p>
			
				<table>
					
					<tr>
						<td class="first">您的姓名:</td>
						<td class="second"><input id="in1" type="text" size="30" /></td>
					</tr>
										
					<tr>
						<td class="first">您的电话号码:</td>
						<td class="second"><input id="in2" type="text" size="30" /></td>
					</tr>

					<tr>
						<td class="first">您的电子邮箱:</td>
						<td class="second"><input id="in3" type="text" size="30" /></td>
					</tr>

					<tr>
						<td class="first">您要购买的课堂:</td>
						<td class="second">
						<select id="course" onchange="showPrice($('#course option:selected').val());">
							<option value="0">请选择 ... </option>
							<?php $i = 1;?>
							<?php foreach($categories as $category){ ?>
								<option <?php echo ($courseid==$i)?'selected':'';?> value="<?php echo $i++;?>" ><?php echo $category['title'];?> </option>
							<? } ?>
						</select>
						</td>
					</tr>
					
					<tr>
						<td class="first">总价:</td>
						<td class="second"><b style="color:#D00;">$<span class="price">0.00</span></b></td>
					</tr>
					
					<tr>
						<td class="first">&nbsp;</td>
						<td class="second"><img onclick="payButton();" style="margin:0;padding:0;cursor:pointer;" src="catalog/view/images/checkout.png" width="100" height="50" border="0" /></td>
					</tr>
					
				</table>
			
			</div>
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>
	
<script>
var nameArray = ['','<?php echo $categories[0]['title'];?>','<?php echo $categories[1]['title'];?>','<?php echo $categories[2]['title'];?>'];
var priceArray = ['0.00','<?php echo $categories[0]['price'];?>','<?php echo $categories[1]['price'];?>','<?php echo $categories[2]['price'];?>'];
function showPrice(course){
	$('.price').text(priceArray[course]);
	$("input[name='item_name_1']").val(nameArray[course]);
	$("input[name='amount_1']").val(priceArray[course]);
}
showPrice(<?php echo $courseid; ?>);

function payButton(){
	
	var err = '';
	var res = true;
	
	//validate
	//in1
	if(jQuery.trim($('#in1').val()) == ""){
		err += '&nbsp;&#8226;&nbsp;请输入你的名字!<br/>';
		res = false;
		
	}
	//in2
	if(jQuery.trim($('#in2').val()) == ""){
		err += '&nbsp;&#8226;&nbsp;请输入你的电话号码!<br/>';
		res = false;
	}
	//in3
	if(jQuery.trim($('#in3').val()) == ""){
		err += '&nbsp;&#8226;&nbsp;请输入你的电子邮箱!<br/>'; 
		res = false;
	}

	if($('#course option:selected').val() == 0){
		err += '&nbsp;&#8226;&nbsp;请选择你所需要购买的课堂!<br/>';
		res = false;
	}
	
	if(!res){
		$.prompt(err);
	}else{
		//$("input[name='custom']").val(jQuery.trim($('#in1').val())+','+jQuery.trim($('#in2').val())+','+jQuery.trim($('#in3').val())+','+$('#course option:selected').val());
		//$('#paypal_btn').submit();
		window.location = 'index.php?route=common/checkout&name='+jQuery.trim($('#in1').val())+'&phone='+jQuery.trim($('#in2').val())+'&email='+jQuery.trim($('#in3').val())+'&courseid='+$('#course option:selected').val();
	}
	
}
</script>

<?php echo $footer;?>