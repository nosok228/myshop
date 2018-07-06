<?php require "header.php"; ?>
<div class=" clear"></div>
		<fieldset>
			<legend><?php echo $product['title']; ?></legend><div id="products">
            <div id="pro"><h2><?php echo $product['title']; ?></h2><img src="../../public/img/<?php echo $product['img']; ?>" width="187" height="134" alt="" /><p><?php echo $product['price']; ?>$</p></div><p><?php echo $product['description']; ?><div id="bigdivider"></div>
			<form method = "post">
			<input type = "hidden" name = "<?php echo $product['title']; ?>" value = "<?php echo $product['id']; ?>">
			<input type = "submit" value = "Добавить">
			</form>
			</div>
		</fieldset>

<?php require "footer.php"; ?>