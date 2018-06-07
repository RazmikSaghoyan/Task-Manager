$(document).ready(function(){
	function getBaseUrl() {
		return 'http://localhost/10web/';
	}
	// Adding form
	$('.add_form_btn').click(function(){
		$('.form_body').toggleClass('hide');
	});
	// Delete form
	$(document).off('click', '.form_body .del_form').on('click', '.del_form', function(){
		$('.form_body').addClass('hide');
		$('.form_body input[type="text"]').val('');
		$('.form_body input[type="number"]').val('');
	});
	// Adding field with publish
	$(document).off('click', '.form_body .add_field').on('click', '.form_body .add_field', function(){
		var fieldNum = $('.form_body .form_fields div:last-child').data('id');
		console.log(fieldNum);
		++fieldNum;
		$(this).parent('p').next('div.form_fields').append(
			'<div data-id="'+ fieldNum +'">' +
				'<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/OOjs_UI_icon_clear.svg/2000px-OOjs_UI_icon_clear.svg.png" alt="Delete Field" class="del_field"/>' +
				'<label>Field name: <input type="text" class="form-control" placeholder="Type Field name" name="field_name'+ fieldNum +'" required></label>' + 
				'<label>Placeholder: <input type="text" class="form-control" placeholder="Type Placeholder" name="placeolder'+ fieldNum +'" required></label>' + 
				'<label>Char Count: <input type="number" class="form-control" name="char_num'+ fieldNum +'" required></label>' + 
			'</div>'
		);
	});
	// Delete field
	$(document).off('click', '.del_field').on('click', '.del_field', function(){
		$(this).parent('div').remove();
	});

	// Edit published form
	$(document).off('click', '.edit_publ_form').on('click', '.edit_publ_form', function(){
		var formId = $(this).closest('.publish_contaner').data('id');
		$.ajax({
			url: getBaseUrl()+"index.php/admin/getEditableForm",
			type: 'post',
			data: {id:formId},
			success: function(data){
				if (data != 'error') {
					data = JSON.parse(data);
					$('.edit_form_list').removeClass('hide');
					$('.edit_form_list').html(
						'<form action='+getBaseUrl()+"index.php/admin/saveEditedForm/"+data[0].id+""+' method="post">' +
							'<div class="form_title">' +
								'<label>Title: <input type="text" class="form-control" placeholder="Type title" name="form_title" value="'+data[0].title+'"></label>' +
							'</div>' +
							'<p>Fields: <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/764773-200.png"  alt="Add Field" class="add_field"/></p>' +
							'<div class="form_fields" ondrop="drop(event)"></div>' +
							'<input type="submit" name="sub" value="Save" class="btn btn-success"">' +
							'<input type="button" name="cancel" value="Cancel" class="cancel_edit btn btn-danger">' +
						'</form>'
					);
					var fieldsArr = data[0].fields;
					for (var i = 0; i <= fieldsArr.length; i++) {
						if (i > 0) {
							$('.edit_form_list .form_fields').append(
								'<div data-id="'+ i +'">' +
									'<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/OOjs_UI_icon_clear.svg/2000px-OOjs_UI_icon_clear.svg.png" alt="Delete Field" class="del_field"/>' +
									'<label>Field name: <input type="text" class="form-control" placeholder="Type Field name" name="field_name'+ i +'" value="'+ fieldsArr[i][0]+'" required></label>' + 
									'<label>Placeholder: <input type="text" class="form-control" placeholder="Type Placeholder" name="placeolder'+ i +'" value="'+fieldsArr[i][1]+'" required></label>' + 
									'<label>Max Length: <input type="number" class="form-control" name="char_num'+ i +'" value="'+fieldsArr[i][2]+'" required></label>' + 
								'</div>'
							);
						} else {
							$('.edit_form_list .form_fields').append(
								'<div data-id="'+ i +'">' +
									'<label>Field name: <input type="text" class="form-control" placeholder="Type Field name" name="field_name'+ i +'" value="'+fieldsArr[i][0]+'" required></label>' + 
									'<label>Placeholder: <input type="text" class="form-control" placeholder="Type Placeholder" name="placeolder'+ i +'" value="'+fieldsArr[i][1]+'" required></label>' + 
									'<label>Max Length: <input type="number" class="form-control" name="char_num'+ i +'" value="'+fieldsArr[i][2]+'" required></label>' + 
								'</div>'
							);
						}
					}
				} else {
					alert("Can't edit this form");
				}
			}
		});
	});

	// Cancel Edit
	$(document).off('click', '.cancel_edit').on('click', '.cancel_edit', function(){
		$(this).closest('.edit_form_list').addClass('hide');
	});

	// Adding field with publish
	$(document).off('click', '.edit_form_list .add_field').on('click', '.edit_form_list .add_field', function(){
		var fieldNum = $('.edit_form_list .form_fields div:last-child').data('id');
		console.log(fieldNum);
		++fieldNum;
		$(this).parent('p').next('div.form_fields').append(
			'<div data-id="'+ fieldNum +'">' +
				'<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/OOjs_UI_icon_clear.svg/2000px-OOjs_UI_icon_clear.svg.png" alt="Delete Field" class="del_field"/>' +
				'<label>Field name: <input type="text" class="form-control" placeholder="Type Field name" name="field_name'+ fieldNum +'" required></label>' + 
				'<label>Placeholder: <input type="text" class="form-control" placeholder="Type Placeholder" name="placeolder'+ fieldNum +'" required></label>' + 
				'<label>Char Count: <input type="number" class="form-control" name="char_num'+ fieldNum +'" required></label>' + 
			'</div>'
		);
	});
});