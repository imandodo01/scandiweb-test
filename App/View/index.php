<?php include "App/View/layout/header.php" ?>

<section class="title-page">
	<h2>Product</h2>
	<div class="title-button">
		<a class="btn" href="<?php echo $this->url ?>/add-product">ADD</a>
		<a class="btn" href="#" id="delete-product-btn">MASS DELETE</a>
	</div>
</section>
<hr>
<section class="prudct-container">
	<div class="product-list">
		<?php
		foreach ($products as $key => $product) {
		?>
			<div class="product">
				<input class="delete-checkbox" type="checkbox" name="product" value="<?php echo $product->get_id(); ?>" id="delete-checkbox-<?php echo $product->get_id(); ?>">
				<h5><?php echo $product->get_name() . "({$product->get_sku()})"; ?></h5>
				<p><?php echo $product->price(); ?></p>
				<p><?php echo $product->measurement(); ?></p>
			</div>
		<?php
		}
		?>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
	$('#delete-product-btn').on('click', function() {
		var ids = $("input:checkbox:checked").map(function() {
			return this.value;
		}).get();
		ids.forEach(element => {
			$('#delete-checkbox-' + element).remove();
		});
		console.log(ids);
		axios.post('<?php echo $this->url ?>/delete', {
				'id': ids
			})
			.then(function(response) {
				location.reload();
			})
			.catch(function(error) {
				console.log(error);
			})
	});
</script>
<?php include "App/View/layout//footer.php" ?>