<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Computer Store</title>
<link href="../../public/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- main -->
<div id="main">
<!-- Left side bar -->
	<div id="LTsidebar">
		<div id="logo"></div>
<!-- Quick Search -->
			<div id="quicksearch">
				<div id="quickheadRT" class="boxheadRT"><h1>Поиск</h1></div>
				<div class="boxheadLT"></div>
					<div class="boxmain">
						<div class="boxmainRT" style="width:144px">
						<form method = "post" action = '/search'>
							<p class="label">ищем:</p>
							<input name="search" type="text" size="18" />
						
							<input type = "submit" name = "submit" value = "Найти">
						</form>
							<p><a href="#" class="comlink">Advanced search</a></p>
						</div>
					 	<div class="boxmainLT"></div>
					</div>
				<div class="boxbottRT"></div>
				<div id="quickbottLT" class="boxbottLT"></div>
			</div>

			<div class="clear"></div>
<!-- Categories --><div class="inner_copy"></div>
			<div id="categories">
				<div id="categorieheadRT" class="boxheadRT"><h1>Категории</h1></div>
		 		<div class="boxheadLT"></div>
					<div class="boxmain">
						<div class="boxmainRT" style="width: 144px;">
							<ul>
								<?php if(isset($categories)): ?>
									<?php foreach($categories as $key => $value): ?>
											<li><a href="/category/<?php echo $categories[$key]['id']; ?>"><?php echo $categories[$key]['title']; ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>
									</ul>
								</div>
					 		<div class="boxmainLT"></div>
						</div>
						<div class="boxbottRT"></div>
						<div id="categoriebottLT" class="boxbottLT"></div>
				</div>
		</div>
<!-- Right sidebar -->
		<div id="RTsidebar">
			<div id="navbar">
				<ul>
					<li><a href="/">Главная</a></li><li><span></span></li>
				<?php if(isset($_SESSION['user']['id'])): ?>
					<li><a href="/cabinet">Кабинет</a></li><li><span></span></li>
					<li><a href="/logout">Выход</a></li><li><span></span></li>
				<?php else: ?>
					<li><a href="/register">Регистрация</a></li><li><span></span></li>
				<?php endif; ?>
				<li><a href="/cart">Корзина</a></li><li><span></span></li>
					<li><a href="#" class="divider">О сайте</a></li>
				</ul>
			</div>
			<?php if(!isset($_SESSION['user']['id'])): ?>
			<div id="login">
				<div id="loginheadRT" class="boxheadRT"><h1>Вход</h1></div>
		 		<div class="boxheadLT"></div>
				<div class="boxmain">
					<div class="boxmainRT" style="width:216px;">
						<form method = "post" action = "/login">
							<p class="label">Email: &nbsp;<input name="email" type="email" size="19"/></p>
							<p class="label">Пароль: &nbsp;&nbsp;<input name="password" type="password" size="19"/></p>										
							<input type = "submit">
						</form>
						</div>
					 		<div class="boxmainLT"></div>
						</div>
						<div class="boxbottRT"></div>
						<div id="loginbottLT" class="boxbottLT"></div>
				</div>
				<?php else: ?>
						<h2 style="color:green">Добро пожаловать, <?php echo $_SESSION['user']['login']; ?>

				 <?php endif; ?>
           			
				<div id="add">
					<div id="addheadRT" class="boxheadRT"><h1>Shipping</h1></div>
		 		<div class="boxheadLT"></div>
						<div class="boxmain">
							<div class="boxmainRT" style="width: 243px;">
					 			<p class="label">Lorem ipsum dolor:</p>
								<p class="label2">Maecenas dolor diam, scelerisque sollicitudin elementum sit amet, elementum nec dolor. Quisque lorem turpis, viverra a aliquam ut, volutpat ac erat. Mauris erat ligula, pharetra vel pulvinar sit amet, </p>
							</div>
					 		<div class="boxmainLT"></div>
						</div>
						<div class="boxbottRT"></div>
						<div id="addbottLT" class="boxbottLT"></div>
				</div>

	