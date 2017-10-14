<!DOCTYPE html>
<html lang="ru" class="no-js">
<head>
	<meta charset="UTF-8"/>
	<title><?= $title ?></title>
	<meta name="description" content=""/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta rel="shortcut icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" type="image/x-icon"/>
	<link rel="stylesheet" href="<?= base_url('assets/css/fonts.min.css') ?>"/>
	<link rel="stylesheet" href="<?= base_url('assets/css/header.min.css') ?>"/>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"/>
</head>
<body>
<div id="page-wrapper">
	<div id="header">
		<h1><a href="/">Личная библиотека книг</a></h1>
		<div id="menu">
			<ul>
				<li><a href="/addBook">Добавить книгу</a></li>
				<li><a href="/importFromXml">Импортировать из xml</a></li>
			</ul>
		</div>
	</div>
	<div id="content">