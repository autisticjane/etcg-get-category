// GET CATAGORY MOD BY DITE (code hosted at https://github.com/autisticjane/etcg-get-category/)
function get_category( $tcg, $category) {

	$database = new Database;
	$sanitize = new Sanitize;
	$tcg = $sanitize->for_db($tcg);
	$category = $sanitize->for_db($category);
	$altname = strtolower(str_replace(' ','',$tcg));

	$result = $database->get_assoc("SELECT `id` FROM `tcgs` WHERE `name`='$tcg' LIMIT 1");
	$tcgid = $result['id'];
	
	$result = $database->get_assoc("SELECT `cards` FROM `cards` WHERE `tcg`='$tcgid' AND 

`category`='$category' LIMIT 1");
	return $result['cards'];

}
