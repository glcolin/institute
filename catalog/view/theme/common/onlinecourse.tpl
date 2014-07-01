<?php echo $header;?>
		
		<div class="content">
			
			<div class="left">
				
				<div class="courselist">
					<h3>购买在线课堂</h3>
					<ul>
					<li><font style="border-bottom:1px #ddd solid;">请在此购买您所需要的课堂,当您付帐成功后,系统会自动给您一个9位数编号,以此编号您便能观看该课堂的视频教程:</font></li>
					<li style="border-bottom:1px #ddd solid;">&nbsp;</li>
					<?php $i = 1; ?>
					<?php foreach($categories as $category){ ?>
						<li><?php echo $category['title'];?> (<font style="color:#D00;font-weight:bold;"><?php echo $category['price'];?></font>)</li>				
						<li style="border-bottom:1px #ddd solid;"><img style="margin:0;padding:0;cursor:pointer;" src="catalog/view/images/buynow.png" width="75" height="37" border="0" onclick="window.location='index.php?route=common/payment&courseid=<?php echo $i++;?>';" /></li>
					<?php } ?>
					</ul>
				</div>

				<p>&nbsp;</p>
				
				<img src="catalog/view/images/trademark.jpg" border="0" width="120" style="margin-left:70px;margin-bottom:50px;border:0px !important;" />
				
				<div style="clear:both;"></div>
				
			</div><!-- left -->
			
			<div class="right">
				
				<?php $i = 1;?>
				<?php foreach($categories as $category){ ?>
					<p style="color:#D00;"><b><?php echo $category['title'];?></b></p>
					<p>
					<b>课堂描述: </b><?php echo htmlspecialchars_decode($category['content']);?>
					</p>
					<p class="onlinecourse_frame">
					<b>课堂列表: </b><br/>
					<?php foreach($courses[$i++] as $course){ ?>
						<a class="onlinecourse_item" href="javascript:void(0);" onclick="clickCourse('<?php echo $course['video_cat_id'];?>','<?php echo $course['id'];?>');" ><?php echo $course['title'];?></a><br/>
					<?php } ?>
					</p>
					<hr/>
				<?php } ?>
			
			</div><!-- right -->
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>
	
	<div class="preload" style="display:none;"><img src="catalog/view/images/spin.gif" /></div>
	
	<style>
	.spin{
		background: url('catalog/view/images/spin.gif') center center no-repeat;
	}
	</style>
	
	<script>
	
	function clickCourse(category,courseID){
	
		var txt = '<table style="width:300px;text-align:center;"><tr style="width:300px;"><td style="width:170px;"><input id="pin" maxlength="9" style="width:165px;" /></td><td id="status" style="width:120px;"></td></tr></table><br/><p><a style="font-size:13px;" href="index.php?route=common/payment&courseid='+category+'">如果你没有购买课堂编号,请点击这儿进入购买页面</a></p>';
	
		$.prompt(txt,{
			title:"<b>请输入你的课堂九位编号号码:</b>",
			submit: function(e,v,m,f){
			
				//locks
				$("#status").html('');
				$("#status").addClass('spin');
				$('#pin').attr('disabled', 'disabled');

				var flag = true;
			
				var pin = $('#pin').val();
				
				if(pin != null && pin != ''){
					//begin of ajax;
					$.ajax({
						url: "index.php?route=common/video/checkPin",
						async: false,
						type: "post",
						data: {
							"pin":pin,
							"cat":category
						},
						success: function(data){
							if(data == "true"){
								window.location = 'http://hyinstitute.com/index.php?route=common/video&cat='+category+'&id='+courseID+'&pin='+pin; 
							}else{
								$("#status").html('<p style="color:red;">输入的课堂编号无效!</p>');	
								flag = false;
							}
						},
						error:function(){
							//ignore for now
						}   
					}); 
					//end of ajax;			
				}//end if
				
				//unlocks
				$("#status").removeClass('spin');
				$('#pin').removeAttr('disabled');
				
				return flag;
			},
			position: { width: 350, arrow: 'br' },
		});
		
	}
	</script>

<?php echo $footer;?>