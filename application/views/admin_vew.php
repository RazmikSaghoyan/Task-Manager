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
		<a href="<?php echo base_url('index.php/user');?>"><button class="btn btn-info user_page">Go to User page</button></a>
		<h1>List of forms</h1>
		<hr>
		<div id="form_list">
			<button class="add_form_btn"> 			
			</button>
			<div class="form_body hide">
				<form action=<?php echo base_url('index.php/admin/publishForm');?> method="post">
					<div class="form_title">
						<label>Title: <input type="text" class="form-control" placeholder="Type title" name="form_title" required></label>
					</div>
					<p>Fields: <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/764773-200.png"  alt="Add Field" class="add_field"/></p>
					<div class="form_fields">
						<div data-id="0">
							<label>Field name: <input type="text" class="form-control" placeholder="Type Field name" name="field_name0" required></label>
							<label>Placeholder: <input type="text" class="form-control" placeholder="Type Placeholder" name="placeolder0" required></label>
							<label>Max Length: <input type="number" class="form-control" name="char_num0" required></label>
						</div>
					</div>
					<input type="submit" name="sub" value="Publish" id="publish_form" class="btn btn-success">
					<input type="button" name="del" value="Delete" class="del_form btn btn-danger">
				</form>
				<div class="error_message">
					<?php if (isset($error) && $error): ?>
						<?php echo '* '.$messege; ?>
					<?php endif ?>
				</div>
				<div class="success_message">
					<?php if (isset($error) && !$error): ?>
						<?php echo '* '.$messege; ?>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
	</section>