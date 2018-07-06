<?php require "header.php"; ?>
<?php var_dump($_SESSION); ?>
				<div class=" clear"></div>
		<fieldset>
			<legend>Товары</legend><div id="products">
			<?php foreach($products as $key => $value): ?>
				<div id="pro"><h2><a href = "/product/<?php echo $products[$key]['id']; ?>"><?php echo $products[$key]['title']; ?> </a></h2><img src="../../public/img/<?php echo $products[$key]['img']; ?>" width="187" height="134" alt="" /><p><?php echo $products[$key]['price']; ?>$</p></div><div id="bigdivider"></div>
			<?php endforeach; ?>
			</div>
		</fieldset>
		
		

<?php require "footer.php"; ?>
