<?php 

class NumbWordter
{
	function convert($num)
	{
	      $output = "";
	      $num = str_pad($num, 36, "0", STR_PAD_LEFT);
	      $group = rtrim(chunk_split($num, 3, " "), " ");
	      $groups = explode(" ", $group);

	      $groups2 = array();
	      foreach($groups as $g) $groups2[] = $this->convertThreeDigit($g{0}, $g{1}, $g{2});

	      for($z = 0; $z < count($groups2); $z++)
	      {
		 if($groups2[$z] != "")
		 {
		    $output .= $groups2[$z].$this->convertGroup(11 - $z).($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1))
		     && $groups2[11] != '' && $groups[11]{0} == '0' ? " and " : ", ");
		 }
	      }

	   $output = rtrim($output, ", ");

	   return $output;
	}

	function convertGroup($index)
	{
	   switch($index)
	   {
	      case 11: return " decillion";
	      case 10: return " nonillion";
	      case 9: return " octillion";
	      case 8: return " septillion";
	      case 7: return " sextillion";
	      case 6: return " quintrillion";
	      case 5: return " quadrillion";
	      case 4: return " trillion";
	      case 3: return " billion";
	      case 2: return " million";
	      case 1: return " thousand";
	      case 0: return "";
	   }
	}

	function convertThreeDigit($dig1, $dig2, $dig3)
	{
	    $output = "";

	   if($dig1 == "0" && $dig2 == "0" && $dig3 == "0") return "";

	   if($dig1 != "0")
	   {
	      $output .= $this->convertDigit($dig1)." hundred";
	      if($dig2 != "0" || $dig3 != "0") $output .= " and ";
	   }

	   if($dig2 != "0") $output .= $this->convertTwoDigit($dig2, $dig3);
	   else if($dig3 != "0") $output .= $this->convertDigit($dig3);

	   return $output;
	}

	function convertTwoDigit($dig1, $dig2)
	{
	   if($dig2 == "0")
	   {
	      switch($dig1)
	      {
		 case "1": return "ten";
		 case "2": return "twenty";
		 case "3": return "thirty";
		 case "4": return "forty";
		 case "5": return "fifty";
		 case "6": return "sixty";
		 case "7": return "seventy";
		 case "8": return "eighty";
		 case "9": return "ninety";
	      }
	   }
	   else if($dig1 == "1")
	   {
	      switch($dig2)
	      {
		 case "1": return "eleven";
		 case "2": return "twelve";
		 case "3": return "thirteen";
		 case "4": return "fourteen";
		 case "5": return "fifteen";
		 case "6": return "sixteen";
		 case "7": return "seventeen";
		 case "8": return "eighteen";
		 case "9": return "nineteen";
	      }
	   }
	   else
	   {
	      $temp = $this->convertDigit($dig2);
	      switch($dig1)
	      {
		 case "2": return "twenty-$temp";
		 case "3": return "thirty-$temp";
		 case "4": return "forty-$temp";
		 case "5": return "fifty-$temp";
		 case "6": return "sixty-$temp";
		 case "7": return "seventy-$temp";
		 case "8": return "eighty-$temp";
		 case "9": return "ninety-$temp";
	      }
	   }
	}
	      
	function convertDigit($digit)
	{
	   switch($digit)
	   {
	      case "0": return "zero";
	      case "1": return "one";
	      case "2": return "two";
	      case "3": return "three";
	      case "4": return "four";
	      case "5": return "five";
	      case "6": return "six";
	      case "7": return "seven";
	      case "8": return "eight";
	      case "9": return "nine";
	   }
	}
}
?>
