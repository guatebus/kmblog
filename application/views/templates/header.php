<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo $title ?> - Blog Web App by Alejandro Bustamante</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().$cssLocation?>style.css" media="screen, handheld" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().$cssLocation?>enhanced.css" media="screen  and (min-width: 40.5em)" />
</head>
<body>
	<header role="banner">
		<div>
			<h1 class="logo"><a href="<?php echo site_url('posts')?>">KMBlog</a></h1>
			 <ul  id="nav-anchors" class="nav-anchors">
            	<li><a href="#nav" id="menu-anchor">Menu</a></li>
            </ul>
			<nav id="nav" class="nav reveal">
				<ul role="navigation">
					<li><a href="<?php echo site_url('posts')?>">List Blog Posts</a></li>
					<li><a href="<?php echo site_url('posts/create')?>">Create Blog Post</a></li>
					<li><a href="<?php echo site_url('login')?>">Login</a></li>
					<?php if($this->session->userdata($this->config->item('username'))): ?>
						<li><a href="<?php echo site_url('logout')?>">Logout</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</header><!--end .header-->
	<?php $info = KM_User_Agent_Helper::getUserAgentInfo(); ?>
		<div class="user-agent-info">
			<div class="inline-block-border-bottom">Viewing in <?php echo $info['agentInfo']; ?> on <?php echo $info['agentPlatform']; ?></div>
			<div><?php echo $info['agentString']; ?></div>
		</div>