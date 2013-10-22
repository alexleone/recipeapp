<pre>
<?php 
print_r($dataPostedToDb);
foreach($dataPostedToDb as $data){
	print '<div style="margin:10px;width:100%;height:auto;">';
	print $data['item_name'].'<br />';
 	print '<img src="data:image/jpeg;base64,' . base64_encode( $data['item_image'] ) . '" />'.'<br />';
 	print $data['item_name'].'<br />';
 	print $data['item_description'].'<br />';
 	print $data['item_category'].'<br />';
 	print $data['pricing'].'<br />';
 	print '<div>';
 	print '<hr style="width:100%;"/>'
}
?>
<pre>