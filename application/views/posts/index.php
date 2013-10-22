<section>
<?php foreach ($posts as $post_item): ?>

    <h2><?php echo $post_item['title'] ?></h2>
    <div class="content-main">
        <?php echo $post_item['content'] ?>
    </div>
    <p class="article-actions-container">
		<a class="article-action-left" href="posts/<?php echo $post_item['slug'] ?>" title="View full article">Read more</a>
	</p>

<?php endforeach ?>
<section>