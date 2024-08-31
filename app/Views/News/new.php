<div class="border p-6 rounded">
	<?= session()->getFlashdata('error') ?>
	<?= validation_list_errors() ?>
	
	<form action="/news" method="post" class="flex flex-col gap-6">
		<?= csrf_field() ?>
		<div class="flex flex-col">
			<label for="title">Title</label>
			<input type="text" name="title" value="<?= set_value('title') ?>">
		</div>
	
		<div class="flex flex-col">
			<label for="body">Text</label>
			<textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
		</div>
	
		<input type="submit" name="submit" value="Create news item">
	</form>
</div>