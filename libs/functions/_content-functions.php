<?php  

function getRelatedContent( $id, $title, $table, $columns, $limit = 3 ) {

	$wordsArray = explode(' ', $title);
	$wordsArray = array_unique($wordsArray);

	$stopWords = ['и', 'на', 'в', 'а', 'под', 'по', 'если', 'за', '-', 'что'];
	$newWordsArray = array();

	foreach ($wordsArray as $word) {
		$word = mb_strtolower($word);
		$word = str_replace('"', "", $word);
		$word = str_replace("'", "", $word);	
		$word = str_replace("«", "", $word);
		$word = str_replace("»", "", $word);
		$word = str_replace(",", "", $word);
		$word = str_replace(".", "", $word);

		if ( !in_array($word, $stopWords) ) {
			
			if ( mb_strlen($word) > 4 ) {
				$word = mb_substr($word, 0, -2);
			} elseif ( mb_strlen($word) > 3 ) {
				$word = mb_substr($word, 0, -1);
			}

			$newWordsArray[] = '%' . $word . '%';
		}
	}

	$sqlQuery = 'SELECT ';

	foreach ($columns as $key => $column) {
	    if ($key === array_key_last($columns)) {
	        $sqlQuery .= $column;
	    } else {
	    	$sqlQuery .= $column . ', ';
	    }
	}

	$sqlQuery .= ' FROM `' . $table . '` WHERE (id NOT LIKE ' . $id . ') AND (';

	for ( $i = 0; $i < count($newWordsArray) ; $i++ ) { 
		if ( $i + 1 === count($newWordsArray) ) {
			$sqlQuery .= 'title LIKE ?';
		} else {
			$sqlQuery .= 'title LIKE ? OR ';
		}
	}

	$sqlQuery .= ') order by RAND() LIMIT ' . $limit;

	return R::getAll($sqlQuery, $newWordsArray);
}

function pagination($type, $results_per_page = 6, $range = 1, $add_settings = null) {

	if ( !isset($_GET['page']) || $_GET['page'] < 1 ) {
		$page_number = 1;
	} else {
		$page_number = intval($_GET['page']);
	}

	if ( !isset( $add_settings ) ) {
		$number_of_results = R::count($type);
	} else {
		$number_of_results = R::count($type, $add_settings[0], $add_settings[1]);	
	}

	$number_of_pages = ceil($number_of_results / $results_per_page);

	if ( $number_of_results == 0 || $number_of_pages == 1  ) {
		$result['status'] = 'off';		
		$result['sql_page_limit'] = '';	
		return $result;
	} else {
		$result['status'] = 'on';	
	}

	if ( $page_number > $number_of_pages ) {
		$page_number = $number_of_pages;
	}

	$starting_limit_number = ($page_number - 1) * $results_per_page;

	$sql_page_limit = "LIMIT {$starting_limit_number}, {$results_per_page}";

	$result['number_of_pages'] = $number_of_pages;
	$result['page_number'] = $page_number;
	$result['sql_page_limit'] = $sql_page_limit;

	$pagelist = array();

	$left_spacer = ($page_number - $range - 1) >= 2 ? $page_number - $range - 1 : null;
	$left_range = ($page_number - $range) >= 1 ? $page_number - $range : 1;
	$right_range = ($page_number + $range) <= $number_of_pages ? $page_number + $range : $number_of_pages;
	$right_spacer = ($page_number + $range + 1) <= $number_of_pages ? $page_number + $range + 1 : null;

	$pagelist[1] = 1;

	for ($number = 2; $number <= $number_of_pages; $number++) {
		if ($number == $left_spacer || $number == $right_spacer) {
			$pagelist[$number] = '...';
		}
		if ($number >= $left_range && $number <= $right_range) {
			$pagelist[$number] = $number;
		}
	}

	$result['pagelist'] = $pagelist;
	return $result;
}

?>