<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<style>
      button {
        display: inline-block;
        background-color: #fe6e00;
		border: 0;
		border-radius: 100%;
        text-align: center;
        font-size: 35px;
        padding: 10px;
        width: 120px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
      }
      button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }
      button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }
      button:hover {
        background-color: #ffd7b5;
      }
      button:hover span {
        padding-right: 25px;
      }
      button:hover span:after {
        opacity: 1;
        right: 0;
      }
    </style>
	<!-- title -->
	<title>Fruitkha</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url();?>/assets/css/responsive.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>