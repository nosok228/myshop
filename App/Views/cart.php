<?php include "header.php"; ?>

<div class=" clear"></div>
		<fieldset>
			<legend>Товары в корзине</legend><div id="products">
            <?php if($products): ?>
			<?php foreach($products as $key => $value): ?>
				<div id="pro"><h2><a href = "/product/<?php echo $products[$key][0]['id']; ?>"><?php echo $products[$key][0]['title']; ?> </a></h2><img src="../../public/img/<?php echo $products[$key][0]['img']; ?>" width="187" height="134" alt="" /><p><?php echo $products[$key][0]['price']; ?>$</p></div><div id="bigdivider"></div>
			<?php endforeach; ?>
			</div>
		</fieldset>
            
		
        <?php else: ?>
            <h1 style="color:red">Корзина пуста</h1>
            <?php endif; ?>
        </div>

<?php include "footer.php"; ?>