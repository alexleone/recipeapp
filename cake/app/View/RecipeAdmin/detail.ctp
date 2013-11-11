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
		
<div class="recipeBox">
	<img class="thumb" src="<?php echo $recipe['images']['0']['hostedLargeUrl']; ?>" alt="<?php echo $recipe['name']; ?>" />
	<h3><?php echo $recipe['name']; ?></h3>
	<h5>Servings: <?php echo $recipe['numberOfServings']; ?></h5>
	<h5>Total Time: <?php echo $recipe['totalTime']; ?></h5>

		<?php if (array_key_exists('cuisine', $recipe['attributes'])) {
			echo "<h5>Cuisine: ";
			$cuisineString = "";
			foreach($recipe['attributes']['cuisine'] as $cuisine) { 
				$cuisineString .= $cuisine. ", ";
			} 
			$cuisineString = substr($cuisineString, 0, -2); // removes ending ", "
			echo $cuisineString."</h5>";
		}
		if (array_key_exists('course', $recipe['attributes'])) { 
			echo "<h5>Course: ";
			$courseString = "";
			foreach($recipe['attributes']['course'] as $course) { 
				$courseString .= $course. ", ";
			}
			$courseString = substr($courseString, 0, -2); // removes ending ", "
			echo $courseString."</h5>";
		}?>
	
	<h5>Directions at: <a id="Logo" href="<?php echo $recipe['source']['sourceRecipeUrl']; ?>" target="_blank"> <?php echo $recipe['source']['sourceDisplayName']; ?></a></h5>
	<h5 class="left">Ingredients:</h5>
	<div class="left paddingSidesM">
		<div class="left">(<a onclick="showAll()" href="javascript:void(0);" class="paddingSidesM">Show All</a>|</div>
		<div class="left"> <a onclick="collapseAll()" href="javascript:void(0);" class="paddingSidesM">Collapse All</a>)</div>
	</div>
<!-- Ingredients -->
	<ul id="ingredientList">
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
						if ($value == 0) {
							echo "<span class=\"bold\">Searching for: ".$key. "</span>";
							echo $this->Form->create('Ins', array('action' => 'search', 'type' => 'post'));
							print $this->Form->input('ProductSearch', array('type'=>'hidden', 'value' => $key, 'id' => 'ProductSearch'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->input('Ingredient', array('type'=>'hidden', 'value' => $key, 'id' => 'Ingredient'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->input('RecipeID', array('type'=>'hidden', 'value' => $recipe['id'], 'id' => 'RecipeID'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->input('ItemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => 'Items'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->end('Search');
						}
						else {
							for ($j=0; !empty($value[$j]); $j++) {
								?>
								<li>
									<img onmouseover="showDes('inDescription<?php echo $numProduct; ?>')" onmouseout="hideDes('inDescription<?php echo $numProduct; ?>')" src="<?php echo "data:image/jpeg;base64," . base64_encode($value[$j]['products']['image']); ?>" alt="pic" class="productImg" />
									<?php echo $value[$j]['products']['name']; ?><br />
									$<?php echo $value[$j]['products']['price']; ?><br />
									<div id="inDescription<?php echo $numProduct; ?>" class="hidingDescription">
										<div class="desWrap"><?php echo $value[$j]['products']['description']; ?></div>
									</div>
								</li>
							<?php 
							$numProduct++;
							} // end for
						} // end else
					echo "</ul>";
					} // end if
				} // end foreach
				// when yummly isn't consistant, type in ingredient and keyword values
				if (!isset($inList[$i])) { ?>
					<li class="clear"><a href="javascript:void(0);" onclick="showProducts('productList<?php echo $i; ?>')"><?php echo $recipe['ingredientLines'][$i]; ?></a></li>
					<!-- Products -->
					<ul id="productList<?php echo $i; ?>" class="hidingProducts">
						<?php
						// display ingredients not stored in order
						$missing = array_diff($items, $inList);
						print_r($missing);
						if (count($missing) == 1) {
							foreach ($missing as $m) {
								echo "<span class=\"bold\">Searching for: ".$m. "</span>";
								echo $this->Form->create('Ins', array('action' => 'search', 'type' => 'post'));
								print $this->Form->input('ProductSearch', array('type'=>'hidden', 'value' => $m, 'id' => 'ProductSearch'.$i, 'div' => 'ins-get-form-text')).'<br />';
								print $this->Form->input('Ingredient', array('type'=>'hidden', 'value' => $m, 'id' => 'Ingredient'.$i, 'div' => 'ins-get-form-text'));
								print $this->Form->input('RecipeID', array('type'=>'hidden', 'value' => $recipe['id'], 'id' => 'RecipeID'.$i, 'div' => 'ins-get-form-text'));
								print $this->Form->input('ItemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => 'Items'.$i, 'div' => 'ins-get-form-text'));
								print $this->Form->end('Search');
							}
						}
						else {
						// think of new way to search for ingredient without having user type or tell user to ignore recipe
							echo $this->Form->create('Ins', array('action' => 'search', 'type' => 'post'));
							print $this->Form->input('ProductSearch', array('type'=>'hidden', 'value' => '', 'label' => 'Product search:', 'id' => 'ProductSearch'.$i, 'div' => 'ins-get-form-text')).'<br />';
							print $this->Form->input('Ingredient', array('type'=>'text', 'value' => '', 'label' => 'Important! Ingredient to be referenced:', 'id' => 'Ingredient'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->input('RecipeID', array('type'=>'hidden', 'value' => $recipe['id'], 'id' => 'RecipeID'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->input('ItemsString', array('type'=>'hidden', 'value' => $itemsString, 'id' => 'Items'.$i, 'div' => 'ins-get-form-text'));
							print $this->Form->end('Search');
						}
						?>
					</ul>
					<?php
				}
			} // end for
			?>
<!-- end Products -->
	</ul>
<!-- end Ingredients -->
 
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
		// appear only when all ingredients have products and recipe is not in db
		if ($display) {
		echo $this->Form->create(null, array('url' => array('controller' => 'RecipeAdmin', 'action' => 'add'), 'type' => 'post'));
		echo $this->Form->input('Recipe.rec_name', array('type'=>'hidden', 'value' => $recipe['id']));
		echo $this->Form->input('Recipe.rating', array('type'=>'hidden', 'value' => $recipe['rating']));
		$explodedItems = explode( '_', $itemsString);
		$n = 0;
		foreach ($explodedItems as $e) {
			echo $this->Form->input('Ins.' .$n. '.in_name', array('type'=>'hidden', 'value' => $e));
			$n++;
		}
		
		if (array_key_exists('cuisine', $recipe['attributes'])) {
			$explodedCuisines = explode( ', ', $cuisineString);
			$n = 0;
			foreach ($explodedCuisines as $e) {
				echo $this->Form->input('Cuisines.' .$n. '.type', array('type'=>'hidden', 'value' => $e));
				$n++;
			}
		}
		if (array_key_exists('course', $recipe['attributes'])) {
			$explodedCourses = explode( ', ', $courseString);
			$n = 0;
			foreach ($explodedCourses as $e) {
				echo $this->Form->input('Courses.' .$n. '.type', array('type'=>'hidden', 'value' => $e));
				$n++;
			}
		}
		echo $this->Form->end('Add Recipe');
		}
		else {
			echo $this->Form->button('Add Recipe', array('disabled' => true, 'class' => 'grayout green'));
		}
	?>
</div>

<?php 	
	} // end if
	else {
		echo "No recipe chosen";
	}
?>