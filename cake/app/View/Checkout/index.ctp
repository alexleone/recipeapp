<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
<?php 
// display recipe
if(!empty($recipe) && isset($recipe)) {
?>


<script type="text/javascript">
	function showProducts(list) {
		if (document.getElementById(list).className == "hidingProducts") {
			document.getElementById(list).className = "showingProducts";
		}
		else {
			document.getElementById(list).className = "hidingProducts";
		}
	}
	
	function showDes(des) {
		document.getElementById(des).className = "showingDescription left";
	}

	function hideDes(des) {
		document.getElementById(des).className = "hidingDescription";
	}
	
	function isEmpty(str) {
    	return (!str || 0 === str.length);
	}
	
	function showAll() {
		var inList = 'productList';
		for (var n = 0; document.getElementById(inList+n); n++) {
			document.getElementById(inList+n).className = "showingProducts";
		}
	}
	
	function collapseAll() {
		var inList = 'productList';
		for (var n = 0; document.getElementById(inList+n); n++) {
			document.getElementById(inList+n).className = "hidingProducts";
		}
	}
</script>

<div id="notGood"></div>
		
<div class="recipeBox">
	<img class="thumb" src="<?php echo $recipe['images']['0']['hostedLargeUrl']; ?>" alt="<?php echo $recipe['name']; ?>" />
	<h2><?php echo $recipe['name']; ?></h2>
	<p>Servings: <span class="bold"><?php echo $recipe['numberOfServings']; ?></span></p>
	<p>Total Time: <span class="bold"><?php echo $recipe['totalTime']; ?></span></p>

		<?php 
		// check if recipe has cuisine types	
		if (array_key_exists('cuisine', $recipe['attributes'])) {
			echo "<p>Cuisine: ";
			$cuisineString = "";
			foreach($recipe['attributes']['cuisine'] as $cuisine) { 
				$cuisineString .= "<span class=\"bold\">" .$cuisine. "</span>, ";
			} 
			$cuisineString = substr($cuisineString, 0, -2); // removes ending ", "
			echo $cuisineString."</p>";
		}
		// check if recipe has course types
		if (array_key_exists('course', $recipe['attributes'])) { 
			echo "<p>Course: ";
			$courseString = "";
			foreach($recipe['attributes']['course'] as $course) { 
				$courseString .= "<span class=\"bold\">" .$course. "</span>, ";
			}
			$courseString = substr($courseString, 0, -2); // removes ending ", "
			echo $courseString."</p>";
		}?>
	
	<p>Directions at: <a id="Logo" href="<?php echo $recipe['source']['sourceRecipeUrl']; ?>" target="_blank"> <?php echo $recipe['source']['sourceDisplayName']; ?></a></p>
	
	<?php  
 	$numProduct = 0;
		
	// order ingredient key words with ingredient detailed lines
	$inList = array();
	$n = 0;
	foreach ($recipe['ingredientLines'] as $ingredient) { 
		foreach ($items as $item) {
			if (stristr($ingredient, $item) !== FALSE && (!isset($inList[$n]) || strlen($inList[$n]) < strlen($item))) {
				$inList[$n] = $item;
			}
		}
		$n++;
	}
			
	// display alert if ingredients and ingredientlines from Yummly do not match up
	// recipe not good to use, don't display ingredients
	$missing = array_diff($items, $inList);
	if (!empty($missing) || count($items) != count($recipe['ingredientLines'])) {
		?>
		<script>
			var element = document.getElementById("notGood");
			element.innerHTML = "Sorry You Some How You Have A Bad Recipe.";
			element.className = "error-message";
		</script>
		<?php
	}
	// recipe good to use, display ingredients
	else {
	?>			
		<p class="left">Ingredients:</p>
		<div class="left paddingSidesM">
			<div class="left">(<a onclick="showAll()" href="javascript:void(0);" class="paddingSidesM">Show All</a>|</div>
			<div class="left"> <a onclick="collapseAll()" href="javascript:void(0);" class="paddingSidesM">Collapse All</a>)</div>
		</div>
		<!-- Ingredients -->
		<ul id="ingredientList">
	
		<?php
		// display ingredient and product info
		for ($i=0; $i<count($items); $i++) {
			foreach ($results as $key => $value) {
				//for ($i=0; $i<count($inList); $i++) {
				if (isset($inList[$i]) && $key == $inList[$i]) {
				?>
					<li class="clear"><a href="javascript:void(0);" onclick="showProducts('productList<?php echo $i; ?>')"><?php echo $recipe['ingredientLines'][$i]; ?></a></li>
					<!-- Products -->
					<ul id="productList<?php echo $i; ?>" class="hidingProducts">
						<?php
						// display products from db
						if ($value !== 0) {
							for ($j=0; !empty($value[$j]); $j++) {
								?>
								<li id="itemCheckOutId<?php print $value[$j]['products']['prod_id']; ?>">
									<img onmouseover="showDes('inDescription<?php echo $numProduct; ?>')" onmouseout="hideDes('inDescription<?php echo $numProduct; ?>')" src="<?php echo "data:image/jpeg;base64," . base64_encode($value[$j]['products']['image']); ?>" alt="pic" class="productImg" />
									<span><?php echo $value[$j]['products']['name']; ?></span>
									<p>$<?php echo $value[$j]['products']['price']; ?></p>
									<div id="inDescription<?php echo $numProduct; ?>" class="hidingDescription">
										<div class="desWrap"><?php echo $value[$j]['products']['description']; ?></div>
									</div>
									<div>
										<button onclick="addToCart(<?php print $value[$j]['products']['prod_id']; ?>, <?php echo $value[$j]['products']['price']; ?>)" >Add To Cart	</button>
										<script>
											function addToCart(prodId, price){
												checkoutItemTotal += price;
						
												var itemDiv = $('#itemCheckOutId'+prodId);
												itemDiv.addClass("cartItem");
												itemDiv.find("div").remove();
												itemDiv.find("img").addClass("cartItemImage");
												itemDiv.find("img").removeAttr("onmouseover");
												itemDiv.find("img").removeAttr("onmouseout");
												itemDiv.find("span").addClass("cartItemName");
												itemDiv.find("p").addClass("cartItemPrce");
												itemDiv.append("<hr>");
												$('#cartItems').append(itemDiv);
												$('.total').html(checkoutItemTotal.toFixed(2));
												$('#amountForPayPal').val(checkoutItemTotal.toFixed(2));
											}
										</script>
									</div>
								</li>
							<?php 
							$numProduct++;
							} // end for
						} // end if
						
					echo "</ul>";
					echo "<!-- end Products -->";
				} // end if
			} // end foreach
		} // end for	
		echo "</ul>";
		echo "<!-- end Ingredients -->";
	} // end else
	?>

 
<!-- Nutrition Facts -->
	<?php  
		$calFatVal = 0;
		$calVal = 0;
		$totFatVal = 0;
		$transFatVal = 0;
		$satFatVal = 0;
		$cholesVal = 0;
		$sodiumVal = 0;
		$kVal = 0;
		$carbVal = 0;
		$fiberVal = 0;
		$sugarVal = 0;
		$proteinVal = 0;
		$vitAVal = 0;
		$vitCVal = 0;
		$caVal = 0;
		$ironVal = 0;
	
	foreach($recipe['nutritionEstimates'] as $nutrition) {
		switch ($nutrition['attribute']) {
			case "FAT_KCAL":
				$calFatVal = $nutrition['value'];
				break;
			case "ENERC_KCAL":
				$calVal = $nutrition['value'];
				break;
			case "FAT":
				$totFatVal = $nutrition['value'];
				break;
			case "FATRN":
				$transFatVal = $nutrition['value'];
				break;
			case "FASAT":
				$satFatVal = $nutrition['value'];
				break;
			case "CHOLE":
				$cholesVal = $nutrition['value']*1000;
				break;
			case "NA":
				$sodiumVal = $nutrition['value']*1000;
				break;
			case "K":
				$kVal = $nutrition['value']*1000;
				break;
			case "CHOCDF":
				$carbVal = $nutrition['value'];
				break;
			case "FIBTG":
				$fiberVal = $nutrition['value'];
				break;
			case "SUGAR":
				$sugarVal = $nutrition['value'];
				break;
			case "PROCNT":
				$proteinVal = $nutrition['value'];
				break;
			case "VITA_IU":
				$vitAVal = $nutrition['value'];
				break;
			case "VITC":
				$vitCVal = $nutrition['value']*1000;
				break;
			case "CA":
				$caVal = $nutrition['value']*1000;
				break;
			case "FE":
				$ironVal = $nutrition['value']*1000;
				break;
		} // end switch
	} // end foreach 
	?>
 
	<table id="nutritionFacts">
		<tr>
			<th colspan="2">Nutrition Facts</th>
		</tr>
		<tr>
			<td colspan="2" class="borderBottomThin">Amount Per Serving</td>
		</tr>
		<tr>
			<td class="borderBottomThick"><span class="bold">Calories</span> <?php echo $calVal; ?></td>
			<td class="right-text borderBottomThick">Calories from Fat <?php echo $calFatVal; ?></td>
		</tr>
		<tr>
			<td colspan="2" class="right-text bold borderBottomThin">% Daily Value*</td>
		</tr>
		<tr>
			<td><span class="bold">Total Fat</span> <?php echo $totFatVal; ?>g</td>
			<td class="right-text bold"><?php echo number_format(($totFatVal/'65')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Saturated Fat <?php echo $satFatVal; ?>g</td>
			<td class="right-text bold"><?php echo number_format(($satFatVal/'20')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Trans Fat <?php echo $transFatVal; ?>g</td>
			<td></td>
		</tr>
		<tr>
			<td><span class="bold">Cholesterol</span> <?php echo $cholesVal; ?>mg</td>
			<td class="right-text bold"><?php echo number_format(($cholesVal/'300')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td><span class="bold">Sodium</span> <?php echo $sodiumVal; ?>mg</td>
			<td class="right-text bold"><?php echo number_format(($sodiumVal/'2400')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td><span class="bold">Potassium</span> <?php echo $kVal; ?>mg</td>
			<td class="right-text bold"><?php echo number_format(($kVal/'3500')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td><span class="bold">Total Carbohydrate</span> <?php echo $carbVal; ?>g</td>
			<td class="right-text bold"><?php echo number_format(($carbVal/'300')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Dietary Fiber <?php echo $fiberVal; ?>g</td>
			<td class="right-text bold"><?php echo number_format(($fiberVal/'25')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Sugars <?php echo $sugarVal; ?>g</td>
			<td></td>
		</tr>
		<tr>
			<td class="borderBottomXThick"><span class="bold">Protein</span> <?php echo $proteinVal; ?>g</td>
			<td class="right-text bold borderBottomXThick"><?php echo number_format(($proteinVal/'50')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Vitamin A <?php echo $vitAVal; ?>IU</td>
			<td class="right-text bold"><?php echo number_format(($vitAVal/'5000')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Vitamin C <?php echo $vitCVal; ?>mg</td>
			<td class="right-text bold"><?php echo number_format(($vitCVal/'60')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td>Calcium <?php echo $caVal; ?>mg</td>
			<td class="right-text bold"><?php echo number_format(($caVal/'1000')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td class="borderBottomThin">Iron <?php echo $ironVal; ?>mg</td>
			<td class="right-text bold borderBottomThin"><?php echo number_format(($ironVal/'18')*100,2).'%'; ?></td>
		</tr>
		<tr>
			<td colspan="2">* Percent Daily Values are based on a 2,000 calorie diet. Your Daily Values may be higher or lower depending on your calorie needs.</td>
		</tr>
	</table>
<!-- end Nutrition Facts -->
	<?php
		// Add Recipe form
		
			
	
	?>
<div style="width:250px;">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="ileone2@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Grocery Products">
<input type="hidden" name="button_subtype" value="services">
<input id="amountForPayPal" type="hidden" name="amount" value="1.00">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="tax_rate" value="7.000">
<input type="hidden" name="shipping" value="4.99">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">

<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

</div>

<?php 	
	} // end if
	else {
		echo "You have arrived here from an unknown location. Please use the nvaigation links.";
	}
?>
<script>
var checkoutItemName = "";
var checkoutItemTotal = 0;
function checkOutConfirm(){
	$("#cart").dialog();	
}

</script>
<div id="cart" title="Confirm Your Order.">
<h1>Cart</h1>
<div id="total-holder">Total Cost: $<span class="total"></span></div>
<div id="cartItems"></div>


</div>


<?php
// Credential	API Signature
// API Username		ileone2_api1.gmail.com
// API Password	Y76CV4TT2T6FCHH3
// Signature	Ai-lBsVToG2LmVQf-gU1QUfZJV34AslkwmFqxnMzpHtLEUD8PCwoX7nC
// Signature	
// Request Date	Nov 24, 2013 11:50:31 PST
?>