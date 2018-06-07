<section class="published_forms_list">
	<?php foreach ($published as $key => $form): ?>
		<div class="publish_contaner" data-id="<?php echo $form['id']; ?>">
			<h3><?php echo ucwords($form['title']); ?></h3>
			<?php if ($form['submited']): ?>
				<span><em>Submited</em></span>
			<?php else: ?>
				<span><em>None Submited</em></span>
			<?php endif ?>
			<div>
				<?php $fileds = unserialize($form['fields']);?>
				<?php foreach ($fileds as $filed): ?>
					<label><?php echo $filed[0] ?> <input type="text" class="form-control" placeholder="<?php echo $filed[1] ?>" maxlength="<?php echo $filed[2] ?>"></label>
				<?php endforeach ?>
			</div>
			<a href="<?php echo base_url('index.php/admin/delPublishedList/'.$form["id"]);?>"><button class="del_publ_form btn btn-danger">Delete</button></a>
			<button class="edit_publ_form btn btn-warning">Edit</button>
		</div>
		<?php if (($key % 4) == 3): ?>
			<div class="clear"></div>
		<?php endif ?>
	<?php endforeach ?>
</section>