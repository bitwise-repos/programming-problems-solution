<?php
//Enter your code here, enjoy!

/*
Q. find a way to split a string on spaces but not when the space is inside double quotes.
Str = 'abc "de fg" hij "kl m n" op' 
This string needs to be split into array like:
[0] => abc
[1] => de fg
[2] => hij
[3] => kl m n
[4] => op

warning: 
it works with only double quotes, and quotes should be in pairs it means if 1 quotes exist in string this function breaks;


it will break when string like this
Str = 'abc de fg hij "kl m n" o"p' 
*/

function dontSplitMyStringInsideDoubleQuote($str) {
	$qVal = 0;
	$data = "";
	$requiredArray = [];
	
	for($i=0; $i < strlen($str); $i++) {
		if($str[$i] == "\"") {
			$qVal++;
			// echo "this is my string's letter ".$str[$i]." ".$i." ". $qVal." <br/>";
			
			$i++;
			while($str[$i]) {
				if($str[$i] == "\"") {
					$qVal++;
					if($qVal%2 == 0) {
						break;
					}
				}
				
				$data .= $str[$i];
				// echo "inside WHILE LOOP this is my string's letter ".$str[$i]." ".$i." ". $qVal." <br/>";
				$i++;
			}
		} elseif($str[$i] == " ") {
			$data .= $str[$i]."-";
			// echo "inside FOR LOOP this is my string's letter ".$str[$i]." ".$i." ". $qVal." <br/>";
		} else {
			$data .= $str[$i];
			// echo "else part nothing left ".$str[$i]." ".$i." ". $qVal." <br/>";
		}
	}

	return $preArray = explode("-", $data);
	
	/*
	this foreach loop removes empty array elements
	
	foreach($preArray as $preAry) {
		if($preAry != " ") {
			// echo $preAry. "<br/>";
			array_push($requiredArray, $preAry);
		}
	}
	
	return $requiredArray;
	*/
}

echo "<br/>";

// works perfect for this type
print_r(dontSplitMyStringInsideDoubleQuote('abc "de fg" hij "kl m n" op'));
echo "<br/>";
print_r(dontSplitMyStringInsideDoubleQuote("abc \"de fg\" hij \"kl m n\" op"));
echo "<br/>";

// this time it counts empty space also into an array
print_r(dontSplitMyStringInsideDoubleQuote('abc "de f   g" h   ij "kl m n" op'));
echo "<br/>";

// unexpected result
print_r(dontSplitMyStringInsideDoubleQuote('abc \"de fg\" hij \"kl m n\" op'));
echo "<br/>";
print_r(dontSplitMyStringInsideDoubleQuote("abc 'de f   g' h   ij 'kl m n' op"));
echo "<br/>";

// this time function breaks
print_r(dontSplitMyStringInsideDoubleQuote('abc de fg hij "kl m n" o"p' ));
echo "<br/>";
print_r(dontSplitMyStringInsideDoubleQuote('abc de fg hij kl m n" op' ));
echo "<br/>";
?>