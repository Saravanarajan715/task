<?php


	if(empty($_POST['firstname']))
	{
		$info['errors']['firstname'] = "A first name is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['firstname']))
	{
		$info['errors']['firstname'] = "First name cant have special characters or spaces and numbers";
	}

	
	if(empty($_POST['middlename']))
	{
		$info['errors']['middlename'] = "A last name is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['middlename']))
	{
		$info['errors']['middlename'] = "middle name cant have special characters or spaces and numbers";
	}

	if(empty($_POST['lastname']))
	{
		$info['errors']['lastname'] = "A last name is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['lastname']))
	{
		$info['errors']['lastname'] = "Last name cant have special characters or spaces and numbers";
	}

	
	if(empty($_POST['email']))
	{
		$info['errors']['email'] = "An email is required";
	}else
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		$info['errors']['email'] = "Email is not valid";
	}

	
	$genders = ['Male','Female'];
	if(empty($_POST['gender']))
	{
		$info['errors']['gender'] = "A gender is required";
	}else
	if(!in_array($_POST['gender'], $genders))
	{
		$info['errors']['gender'] = "Gender is not valid";
	}

    if(empty($_POST['age']))
	{
		$info['errors']['age'] = "age is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['age']))
	{
		$info['errors']['age'] = "age cant have special characters or spaces ";
	}

	if(empty($_POST['contact']))
	{
		$info['errors']['contact'] = "contact is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['contact']))
	{
		$info['errors']['contact'] = "contact cant have special characters or spaces ";
	}

	if(empty($_POST['dob']))
	{
		$info['errors']['dob'] = "dob is required";
	}else
	if(!preg_match("/^[\p{L}]+$/", $_POST['dob']))
	{
		$info['errors']['dob'] = "dob cant have special characters or spaces ";
	}


	if(empty($_POST['password']))
	{
		$info['errors']['password'] = "A password is required";
	}else
	if($_POST['password'] !== $_POST['retype_password'])
	{
		$info['errors']['password'] = "Passwords dont match";
	}else
	if(strlen($_POST['password']) < 8)
	{
		$info['errors']['password'] = "Password must be at least 8 characters long";
	}


	if(empty($info['errors']))
	{
		
		$arr = [];
		$arr['firstname'] 	= $_POST['firstname'];
		$arr['middlename'] 	= $_POST['middlename'];
		$arr['lastname'] 	= $_POST['lastname'];
		$arr['email'] 		= $_POST['email'];
		$arr['gender'] 		= $_POST['gender'];
		$arr['age'] 		= $_POST['age'];
		$arr['contact'] 	= $_POST['contact'];
		$arr['dob'] 		= $_POST['dob'];
		$arr['password'] 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
		$arr['date'] 		= date("Y-m-d H:i:s");

		db_query("insert into users (firstname,middlename,lastname,gender,age,contact,dob,password,date,email) values (:firstname,:middlename,:lastname,:gender,:age,:contact,:dob,:password,:date,:email)",$arr);

		$info['success'] 	= true;
	}