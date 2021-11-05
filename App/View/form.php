<?php include "App/View/layout/header.php" ?>
<form id="product_form" method="post" class="form contact-form">
	<section class="title-page">
		<h3 style="margin-bottom: 0rem;">Product Add</h3>
		<div class="title-button">
			<button class="btn" type="submit" style="padding: 0.95em;">Save</button>
			<a class="btn" href="<?php echo $this->url ?>">Cancel</a>
		</div>
	</section>
	<hr>
	<div class="form-row">
		<label for="sku" class="form-label">SKU</label>
		<input type="text" name="sku" id="sku" class="form-input">
		<small class="form-alert" id="sku-alert" style="display:none;">Please, submit required data</small>
	</div>
	<div class="form-row">
		<label for="name" class="form-label">Name</label>
		<input type="text" name="name" id="name" class="form-input">
		<small class="form-alert" id="name-alert" style="display:none;">Please, submit required data</small>
	</div>
	<div class="form-row">
		<label for="price" class="form-label">Price ($)</label>
		<input type="text" name="price" id="price" class="form-input">
		<small class="form-alert" id="price-alert" style="display:none;">Please, submit required data</small>
	</div>
	<div class="form-row">
		<label for="productType" class="form-label">Type Switcher</label>
		<select name="type" id="productType" class="form-input">
			<option value=""></option>
			<option value="DVD">DVD</option>
			<option value="Book">Book</option>
			<option value="Furniture">Furniture</option>
		</select>
		<small class="form-alert" id="productType-alert" style="display:none;">Please, submit required data</small>
	</div>
	<div id="DVD" style="display: none;" class="form-row">
		<h5>Please Provide Size</h5>
		<label for="size" class="form-label">Size (MB)</label>
		<input type="text" name="size" id="size" class="form-input">
		<small class="form-alert" id="size-alert" style="display:none;">Please, submit required data</small>
	</div>
	<div id="Furniture" style="display: none;">
		<div class="form-row">
			<h5>Please Provide Dimension</h5>
			<label for="height" class="form-label">Height (CM)</label>
			<input type="text" name="height" id="height" class="form-input">
			<small class="form-alert" id="height-alert" style="display:none;">Please, submit required data</small>
		</div>
		<div class="form-row">
			<label for="width" class="form-label">Width (CM)</label>
			<input type="text" name="width" id="width" class="form-input">
			<small class="form-alert" id="width-alert" style="display:none;">Please, submit required data</small>
		</div>
		<div class="form-row">
			<label for="length" class="form-label">Length (CM)</label>
			<input type="text" name="length" id="length" class="form-input">
			<small class="form-alert" id="length-alert" style="display:none;">Please, submit required data</small>
		</div>
	</div>
	<div id="Book" style="display: none;" class="form-row">
		<h5>Please Provide Weight</h5>
		<label for="weight" class="form-label">Weight (KG)</label>
		<input type=" text" name="weight" id="weight" class="form-input">
		<small class="form-alert" id="weight-alert" style="display:none;">Please, submit required data</small>
	</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
	var lastvalue = '';
	$('#productType').on('change', function() {
		if (this.value != "") {
			$('#' + this.value).show();
			if (lastvalue != '') $('#' + lastvalue).hide();
			lastvalue = this.value;
		} else {
			$('#DVD').hide();
			$('#Furniture').hide();
			$('#Book').hide();

		}
	});
	$(function() {
		$('#product_form').on('submit', function(e) {
			e.preventDefault();
			var validation = 1;
			var data = $("#product_form :input").serializeArray();
			console.log(data);
			var formdata = {};
			data.forEach(element => {
				formdata[element['name']] = element['value'];
			});
			$('#sku-alert').html('Please, submit required data');
			$('#size-alert').html('Please, submit required data');
			$('#height-alert').html('Please, submit required data');
			$('#width-alert').html('Please, submit required data');
			$('#length-alert').html('Please, submit required data');
			$('#weight-alert').html('Please, submit required data');

			$('#sku-alert').hide();
			$('#name-alert').hide();
			$('#price-alert').hide();
			$('#productType-alert').hide();
			$('#size-alert').hide();
			$('#height-alert').hide();
			$('#width-alert').hide();
			$('#length-alert').hide();
			$('#weight-alert').hide();

			if (formdata['sku'] == "") {
				$('#sku-alert').show();
				validation = 0;
			}
			if (formdata['name'] == "") {
				$('#name-alert').show();
				validation = 0;
			}
			if (formdata['price'] == "") {
				$('#price-alert').show();
				validation = 0;
			}
			if (isNaN(formdata['price'])) {
				$('#price-alert').show();
				$('#price-alert').html('Please, provide the data of indicated type”');
				validation = 0;
			}
			if (formdata['productType'] == "") {
				$('#productType-alert').show();
				validation = 0;
			}
			if ($('#DVD').is(':visible')) {
				if (formdata['size'] == "") {
					$('#size-alert').show();
					validation = 0;
				}
				if (isNaN(formdata['size'])) {
					$('#size-alert').show();
					$('#size-alert').html('Please, provide the data of indicated type”');
					validation = 0;
				}
			}
			if ($('#Furniture').is(':visible')) {
				if (formdata['height'] == "") {
					$('#height-alert').show();
					validation = 0;
				}
				if (formdata['width'] == "") {
					$('#width-alert').show();
					validation = 0;
				}
				if (formdata['length'] == "") {
					$('#length-alert').show();
					validation = 0;
				}
				if (isNaN(formdata['height'])) {
					$('#height-alert').show();
					$('#height-alert').html('Please, provide the data of indicated type”');
					validation = 0;
				}
				if (isNaN(formdata['width'])) {
					$('#width-alert').show();
					$('#width-alert').html('Please, provide the data of indicated type”');
					validation = 0;
				}
				if (isNaN(formdata['length'])) {
					$('#length-alert').show();
					$('#length-alert').html('Please, provide the data of indicated type”');
					validation = 0;
				}
			}
			if ($('#Book').is(':visible')) {
				if (formdata['weight'] == "") {
					$('#weight-alert').show();
					validation = 0;
				}
				if (isNaN(formdata['weight'])) {
					$('#weight-alert').show();
					$('#weight-alert').html('Please, provide the data of indicated type”');
					validation = 0;
				}
			}
			if (validation == 1) {
				axios.post('<?php echo $this->url ?>/insert', formdata)
					.then(function(response) {
						console.log(response.data);
						if (response.data == 0) {
							$('#sku-alert').show();
							$('#sku-alert').html('sku already used');
						} else {
							window.location.replace("<?php echo $this->url ?>/");
						}
					})
					.catch(function(error) {
						console.log(error);
					})
			}
		});
	});
</script>
<?php include "App/View/layout//footer.php" ?>