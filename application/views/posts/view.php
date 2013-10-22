<section>
	<h2><?php echo $post_item['title'] ?></h2>
	<div class="content-main"><?php echo $post_item['content'] ?></div>
	</br>
	<?php if(Admin_Validator_Helper::isAdmin()): ?>
		<div class="article-actions-container">
			<a class="article-action-left" href="<?php echo site_url('posts/censor')."/".$post_item['slug'] ?>" title="Censor this post">Censor post</a>
		</div>
	<?php endif; ?>
</section>