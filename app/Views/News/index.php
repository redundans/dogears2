<?php if ($news_list !== []): ?>
	<div class="flex flex-col divide-y -my-6">
	<?php foreach ($news_list as $news_item): ?>
		<div class="flex flex-col gap-3 py-6">
			<h3 class="m-0 font-semibold"><?= esc($news_item['title']) ?></h3>
			<div class="main">
				<?= esc($news_item['body']) ?>
			</div>
			<p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>
		</div>
	<?php endforeach ?>
	</div>
<?php else: ?>

	<h3>No News</h3>

	<p>Unable to find any news for you.</p>

<?php endif ?>