<?php
	if(isset($_GET['name_edit_author_e'])){
		$model = new author();
		$model->add_author($conn,$_GET['name_edit_author_e'],$_GET['email_e'],$_GET['phone_e'],$_GET['birthday_e'],$_GET['address_e']);
	}
	if(isset($_GET['tam_author'])){
		$model = new author();
		$model->show_author($conn);
	}
	if(isset($_GET['delete_author'])){
	$model = new author();
	$model->delete_author($conn,$_GET['delete_author']);
	}
	// show form edit author
	if(isset($_GET['edit_form_author'])){
	$model = new author();
	$model->show_form($conn,$_GET['edit_form_author']);
	}
	//edit author
	if(isset($_GET['id_author'])){
	$model = new author();
	$model->edit_author($conn,$_GET['id_author'],$_GET['name_edit_author'],$_GET['email'],$_GET['phone'],$_GET['birthday'],$_GET['address']);
	}
?>