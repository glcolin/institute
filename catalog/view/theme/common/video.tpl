<?php echo $header;?>
		
		<div class="content">
			
			<div class="left">
				
				<div class="courselist">
					<h3><?php echo $category['title'];?></h3>
					
					<div style="background:#ddd;margin-bottom:20px;">
						<p > - 表示还没观看视频</p>
						<p class="watching"> - 表示正在观看,还没过期的视频</p>
						<p class="watched"> - 表示已经看完了的视频</p>
					</div>
					
					<?php $i = 0;?>
					<?php $watchedCount = 0;?>
					<?php $watchingCount = 0;?>
					<?php foreach($courses as $course){ ?>
						<?php
						//check status:
						$class = '';
						if(isset($record[$course['id']])){
							if($record[$course['id']]['isValid']){
								$class = 'class="watching"';
								$watchingCount++;
							}else{
								$class = 'class="watched"';
								$watchedCount++;
							}
						}
						?>
						<p <?php echo $class;?> ><a href="index.php?route=common/video&cat=<?php echo $user['course'];?>&id=<?php echo $course['id'];?>&pin=<?php echo $user['pin'];?>"><?php echo $course['title'];?></a></p>
					<?php } ?>
					<div>&nbsp;</div>
				</div>

				<p>&nbsp;</p>
				
				<img src="catalog/view/images/trademark.jpg" border="0" width="120" style="margin-left:70px;margin-bottom:50px;border:0px !important;" />
				
				<div style="clear:both;"></div>
				
			</div><!-- left -->
			
			<div class="right">
				<h3>观看视频页面</h3>
				<div class="video_data">					
					<table>
						<tr>
							<td class="first"><b>基本信息</b></td>
							<td class="second">&nbsp;</td>
						</tr>
						<tr>
							<td class="first">学生姓名:</td>
							<td class="second"><?php echo $user['name'];?></td>
						</tr>
						<tr>
							<td class="first">学生电邮:</td>
							<td class="second"><?php echo $user['email'];?></td>
						</tr>
						<tr>
							<td class="first">视频总数:</td>
							<td class="second"><?php echo count($courses);?></td>
						</tr>
						<tr>
							<td class="first">正在看视频数:</td>
							<td class="second"><?php echo $watchingCount;?></td>
						</tr>
						<tr>
							<td class="first">已看完视频数:</td>
							<td class="second"><?php echo $watchedCount;?></td>
						</tr>
						<tr>
							<td class="first">还没看视频数:</td>
							<td class="second" style="color:#D00;"><?php echo count($courses)-$watchingCount-$watchedCount;?></td>
						</tr>
						<tr>
							<td class="first">特别说明:</td>
							<td class="second">点击以下视频就能开始播放和观看,但请学生们必须注意,每一个视频一旦开始后,只能有<b style="color:#D00;">3个小时</b>的观看时间,一旦3小时过去,视频会马上过期,学生就再也无法重新观看.</td>
						</tr>
					</table>
				</div>
				
				<!-- Chang URLs to wherever Video.js files will be hosted -->
				<link href="catalog/view/plugin_video_player/video-js.css" rel="stylesheet" type="text/css">
				<!-- video.js must be in the <head> for older IEs to work. -->
				<script src="catalog/view/plugin_video_player/video.js"></script>

				<!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
				<script>
					videojs.options.flash.swf = "catalog/view/plugin_video_player/video-js.swf";
				</script>
				
				<h3><?php echo $video['title'];?></h3>
				<div><?php echo htmlspecialchars_decode($video['content']);?></div>
				<div style="text-align:center;">
				<?php
				if(!isset($record[$id])){
					echo '<a onclick="isSure()" href="javascript:void(0)" ><img style="cursor:pointer;" src="catalog/view/images/video.jpg" border="0"/></a><br/><br/><font style="color:#D00;">注意!在点击这个视频后,将开始计时,你只能在计时后3小时内播放视频!</font>';
				}else if($record[$id]['isValid']){
					echo '
					<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
						poster="catalog/view/images/black.png"
						data-setup="{}">
						<source src="index.php?route=common/video/playVideo&cat='.$user['course'].'&id='.$id.'&pin='.$user['pin'].'" type="video/mp4">
						Your browser does not support the video tag.
					</video>
					<br/><br/>
					<font style="color:#D00;">播放视频时有时候可能会出现兼容性问题,建议<a href="javascript:void(0)" onclick="location.reload();">刷新</a>页面或使用<a target="_blank" href="http://www.google.com/chrome">Google Chrome</a>浏览器播放!</font>
					<br/><br/>
					<div class="video_data">					
						<table>
							<tr>
								<td class="first"><b>视频开始时间:</b></td>
								<td class="second">'.$record[$id]['start_time'].'</td>
							</tr>
							<tr>
								<td class="first"><b>视频过期时间:</b></td>
								<td class="second">'.$record[$id]['end_time'].'</td>
							</tr>
						</table>
					</div>
					';
				}else{
					echo '<img src="catalog/view/images/expired.jpg" border="0"/><br/><br/><font style="color:#D00;">对不起!此视频已过期,不能再重新播放!</font>';
				}
				?>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div><!-- right -->
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>

<style>
.watched{
	background: url('catalog/view/images/watched.png') 30px 11px no-repeat !important;
}
.watching{
	background: url('catalog/view/images/watching.png') 30px 11px no-repeat !important;
}
</style>

<script>
function isSure(){
	$.prompt("按确认键开始观看视频,并开始计时3小时的观看时间", {
		title: "确认开始观看该视频?",
		buttons: { "确认": true, "消除": false },
		submit: function(e,v,m,f){
			if(v){
				window.location = 'index.php?route=common/video/playVideo&cat=<?php echo $user['course'];?>&id=<?php echo $id;?>&pin=<?php echo $user['pin'];?>';
			}
		}
	});
}
</script>

<?php echo $footer;?>

