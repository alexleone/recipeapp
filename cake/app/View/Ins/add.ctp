<?php 
foreach($dataPostedToDb as $data){
	print '<div class="ins-add-outer">';
	print '<div class="ins-add-box-thumb"><img src="data:image/jpeg;base64,' . base64_encode( $data['item_image'] ) . '" /></div>';
	print '<div class="ins-add-box-text">';
	print '<span class="in-add-bold">Item Name: </span>'.$data['item_name'].'<br />';
 	print '<span class="in-add-bold">Item Description: </span>'.$data['item_description'].'<br />';
 	print '<span class="in-add-bold">Item Category: </span>'.$data['item_category'].'<br />';
 	print '<span class="in-add-bold">Item Pricing: </span>'.$data['pricing'].'<br />';
 	print '<br/></div></div>';
 	print '<hr class="ins-add-hr"/>';
}
?>
