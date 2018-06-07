	<section>
		<h1>List of submissions</h1>
		<hr>
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Form Name</th>
		        <th colspan="2">Fild Values</th>
		        <th>User IP (local)</th>
		        <th>Date</th>
		      </tr>
		      <tr>
		        <td></td>
		        <td><em>Fild Name</em></td>
		        <td><em>Fild Value</em></td>
		        <td></td>
		        <td></td>
		      </tr>
		    </thead>
		    <tbody>
		      <?php foreach ($submited as $value): ?>
		      	  <?php 
		      	  	$fieldValues = unserialize($value['fields_value']);
		      	  	$nameArr     = array_keys($fieldValues);
		      	  	$valuesArr   = array_values($fieldValues);
		      	  	
		      	  ?>
			      <tr data-id="<?php echo $value['id'] ?>">
			        <td><?php echo $value['title']; ?></td>
			        <td>
			        	<?php 
			        		foreach ($nameArr as $name) {
			        			echo $name.": <br>";
			        		}
			        	 ?>
			        </td>
			        <td>
						<?php 
							foreach ($valuesArr as $val) {
								echo $val."<br>";
							}
						 ?>
			        </td>
			        <td><?php echo $value['user_ip']; ?></td>
			        <td><?php echo $value['date']; ?></td>
			      </tr>
		      <?php endforeach ?>
		    </tbody>
		</table>
	</section>
</body>
</html>