

<?php
	$val = ''; 
	if(is_search()){
		$val = get_query_var('s');
	}
?>
<form action="<?php echo home_url(); ?>" method="get" name="search_form" class="ng-pristine ng-valid">
	<input name="s" type="text" placeholder="Search and press enter" value="<?php echo $val; ?>">
	<input type="submit" style="visibility:hidden; position: absolute; right: 500px; ">
</form>