<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>webroot/js/form_js.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>webroot/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<section>
		<a href="<?php echo base_url('index.php/admin');?>"><button class="btn btn-primary user_page">Go to Admin page</button></a>
		<h1>Published form List</h1>
		<hr>
		<?php foreach ($published as $key => $form): ?>
			<div class="publish_contaner" data-id="<?php echo $form['id']; ?>">
				<h3><?php echo ucwords($form['title']); ?></h3>
				<div>
					<form action=<?php echo base_url('index.php/user/submitForm/'.$form['id']);?> method="post">
						<?php 
							$fileds = unserialize($form['fields']);
							$disabled = $form['submited'] ? 'disabled' : '';
						?>
						<?php foreach ($fileds as $filed): ?>
							<label><?php echo $filed[0] ?> <input type="text" class="form-control" name="<?php echo $filed[0] ?>" placeholder="<?php echo $filed[1] ?>" maxlength="<?php echo $filed[2] ?>" <?php echo $disabled ?>></label>
						<?php endforeach ?>
						<input type="submit" name="sub" value="Submit" class="btn btn-success" <?php echo $disabled ?>>
					</form>
				</div>
			</div>
			<?php if (($key % 4) == 3): ?>
				<div class="clear"></div>
			<?php endif ?>
		<?php endforeach ?>
	</section>
</body>
</html>