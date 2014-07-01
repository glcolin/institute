<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo isset($title)?$title:'Title'; ?></title>
<?php if (isset($description)) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if (isset($keywords)) { ?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php } ?>
<?php if (isset($styles)) { ?>
	<?php foreach ($styles as $style) { ?>
	<link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
	<?php } ?>
<?php } ?>
<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<script type="text/javascript" src="view/javascript/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.10.3.custom.min.js"></script>
<link type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="view/javascript/common.js"></script>
<?php if (isset($scripts)) { ?>
	<?php foreach ($scripts as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
	<?php } ?>
<?php } ?>
<link type="text/css" href="view/stylesheet/login.css" rel="stylesheet" />
</head>
<body>

<div id="container">
	<div id="header">
		<div class="div1">
			<div class="div2">
				<img src="view/image/logo.png" onClick="location = index.php" />
			</div>
			<div class="div3">
				<?php if(isset($login)){ ?>
					<img src="view/image/lock.png" alt="" style="position: relative; top: 3px;" />
					<?php if($login == 0){ ?>
						You are not yet logged in.
					<?php } ?>
					
					<?php if($login == 1){ ?>
						You are logged in as <?php echo $login_username;?>.
					<?php } ?>
					
				<?php } ?>
			</div>
		</div>
	</div><!-- end header -->
	<?php if ($login == 1) { ?>
	<div id="menu" >
		<ul class="left" style="display: none;">
			<li id="home">
				<a class="top">文章页面</a>
            	<ul>
					<li><a href="index.php?route=content/news">学校新闻</a></li>
					<li><a href="index.php?route=content/about">首页简介</a></li>
					<li><a href="index.php?route=content/about2">关于我们</a></li>
					<li><a href="index.php?route=content/about3">护士出国</a></li>
					<li><a href="index.php?route=content/about5">月子中心</a></li>
					<li><a href="index.php?route=content/about4">国际医护班</a></li>
				</ul>
			</li>
			<li id="pictures">
            	<a class="top">图片页面</a>
            	<ul>
					<li><a href="index.php?route=pictures/pictures">首页图片</a></li>
				</ul>
            </li>
			<!--<li id="videos">
            	<a class="top">视频管理页面</a>
            	<ul>
					<li><a href="index.php?route=videos/category">课堂分类管理</a></li>
					<li><a href="index.php?route=videos/videos">视频管理</a></li>
				</ul>
            </li>-->
			<li id="products">
            	<a class="top">课程页面</a>
            	<ul>
					<li><a href="index.php?route=products/products">护理课程</a></li>
					<li><a href="index.php?route=products2/products">美容课程</a></li>
				</ul>
            </li>
			<!--<li id="account">
            	<a class="top">学生视频帐号管理</a>
            	<ul>
					<li><a href="index.php?route=pin/pin">帐号列表</a></li>
				</ul>
            </li>
			-->
			<li id="gallery">
            	<a class="top">相册</a>
            	<ul>
					<li><a href="index.php?route=gallery/albums">相册</a></li>
				</ul>
            </li>
            <li id="system">
            	<a class="top">System</a>
				<ul>
					<li><a href="index.php?route=tool/backup">Database Backup</a></li>
					<li><a href="index.php?route=tool/reset">Reset Password</a></li>
				</ul>
			</li>
		</ul>
		
		<ul class="right" style="display: none;">
			<li id="store"><a href="../index.php" target="_blank" class="top">View Front</a></li>
			<li><a class="top" href="index.php?route=common/logout">Logout</a></li>
		</ul>
	</div><!-- end menu -->
    <?php }?>