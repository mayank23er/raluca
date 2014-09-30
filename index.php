<?php
const SPACING_X = 1;
const SPACING_Y = 0;
const JOINT_CHAR = '+';
const LINE_X_CHAR = '-';
const LINE_Y_CHAR = '|';
 
$table = array(
	array(
		'Name' => 'Trixie',
		'Color' => 'Green',
		'Element' => 'Earth',
		'Likes' => 'Flowers'
	),
	array(
		'Name' => 'Tinkerbell',
		'Element' => 'Air',
		'Likes' => 'Singing',
		'Color' => 'Blue'
	),
	array(
		'Element' => 'Water',
		'Likes' => 'Dancing',
		'Name' => 'Blum',
		'Color' => 'Pink'
	),
);
 
function draw_table($table){
 
$nl = "\n";
$columns_headers = columns_headers($table);
$columns_lengths = columns_lengths($table, $columns_headers);
$row_separator = row_seperator($columns_lengths);
$row_spacer = row_spacer($columns_lengths);
$row_headers = row_headers($columns_headers, $columns_lengths);
 
echo '<pre>';
 
echo $row_separator . $nl;
echo str_repeat($row_spacer . $nl, SPACING_Y);
echo $row_headers . $nl;
echo str_repeat($row_spacer . $nl, SPACING_Y);
echo $row_separator . $nl;
echo str_repeat($row_spacer . $nl, SPACING_Y);
foreach($table as $row_cells)
{
	$row_cells = row_cells($row_cells, $columns_headers, $columns_lengths);
	echo $row_cells . $nl;
	echo str_repeat($row_spacer . $nl, SPACING_Y);
}
echo $row_separator . $nl;
 
echo '</pre>';
 
}
 
function columns_headers($table){
	return array_keys(reset($table));
}
 
function columns_lengths($table, $columns_headers){
	$lengths = [];
	foreach($columns_headers as $header)
	{
		$header_length = strlen($header);
		$max = $header_length;
	foreach($table as $row)
	{
		$length = strlen($row[$header]);
		if($length > $max)
		$max = $length;
	}
	 
	if(($max % 2) != ($header_length % 2))
		$max += 1;
		 
		$lengths[$header] = $max;
	}
	 
	return $lengths;
}
 
function row_seperator($columns_lengths){
	$row = '';
	foreach($columns_lengths as $column_length)
	{
		$row .= JOINT_CHAR . str_repeat(LINE_X_CHAR, (SPACING_X * 2) + $column_length);
	}
	$row .= JOINT_CHAR;
	 
	return $row;
}
 
function row_spacer($columns_lengths){
	$row = '';
	foreach($columns_lengths as $column_length)
	{
		$row .= LINE_Y_CHAR . str_repeat(' ', (SPACING_X * 2) + $column_length);
	}
	$row .= LINE_Y_CHAR;
	 
	return $row;
}
 
function row_headers($columns_headers, $columns_lengths){
	$row = '';
	foreach($columns_headers as $header)
	{
		$row .= LINE_Y_CHAR . str_pad($header, (SPACING_X * 2) + $columns_lengths[$header], ' ', STR_PAD_BOTH);
	}
	$row .= LINE_Y_CHAR;
	 
	return $row;
}
 
function row_cells($row_cells, $columns_headers, $columns_lengths){
	$row = '';
	foreach($columns_headers as $header)
	{
		$row .= LINE_Y_CHAR . str_repeat(' ', SPACING_X) . str_pad($row_cells[$header], SPACING_X + $columns_lengths[$header], ' ', STR_PAD_RIGHT);
	}
	$row .= LINE_Y_CHAR;
	 
	return $row;
}
?>
<div style="position: relative;">
<?php draw_table($table);?>
<div class="overlap col1"></div>
<div class="overlap col2"></div>
<div class="overlap col3"></div>
<div class="overlap col4"></div>
</div>
<style type="text/css">
.overlap{
	position: absolute;
}

.col1{
	background: none repeat scroll 0% 0% #D23E2A;
	top: 0px;
	opacity: 0.29;
	height: 104px;
	width: 110px;
	left: 1px;
}
.col2{
	background: none repeat scroll 0% 0% #35B137;
	top: 0px;
	opacity: 0.29;
	height: 104px;
	width: 66px;
	left: 109px;
}
.col3{
	background: none repeat scroll 0% 0% #4862A3;
	top: 0px;
	opacity: 0.29;
	height: 104px;
	width: 82px;
	left: 173px;
}
.col4{
	background: none repeat scroll 0% 0% #EC98BA;
	top: 0px;
	opacity: 0.29;
	height: 104px;
	width: 84px;
	left: 252px;
}
</style>