<?php
$item =$_POST['item'];
$api_url='http://www.SupermarketAPI.com/api.asmx/COMMERCIAL_SearchForItem?APIKEY=fa6a47f80f&StoreId=698ea63147&ItemName='.$item.'';
$xml=simplexml_load_file($api_url);
?>
<pre>
<?php
print_r($xml);
?>
</pre>