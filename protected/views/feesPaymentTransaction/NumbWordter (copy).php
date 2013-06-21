<?php 
//-----------------------------------------------------------
//     NumbWordter - Number to Word converter class in PHP
//   Written by Manda Krishna Srikanth (krishnasrikanth.com)
//-----------------------------------------------------------
class NumbWordter
{
	private $discrete=array('0'=>'zero','1'=>'one','2'=>'two','3'=>"three",'4'=>"four",'5'=>"five",'6'=>'six','7'=>'seven',
	'8'=>'eight','9'=>'nine','10'=>'ten','11'=>'eleven',"12"=>'twelve','13'=>'thirteen','14'=>'fourteen',
	'15'=>'fifteen','16'=>'sixteen','17'=>'seventeen','18'=>'eighteen','19'=>'nineteen','-'=>'minus');
	
	private $ten_digit_prefix=array('1'=>'ten','2'=>'twenty','3'=>'thirty','4'=>'forty','5'=>'fifty','6'=>'sixty',
	'7'=>'seventy','8'=>'eighty','9'=>'ninty');
	
	private $mool_array=array('',"thousand","million,","billion,","trillion,","quadrillion,","quintillion,","sextillion,",
	"septillion,","octillion,","nonillion,","decillion,","unidecillion,","duodecillion,","tredecillion,","quattuordecillion,");

	private $sentence; //final sentence
	private $error; //error if generated

	//methods
	private function twodigits($num)
	{
		//displays from 1 to 99
		if($num<20)

			return $this->discrete[substr($num,0,1)];
		else
			return $this->ten_digit_prefix[substr($num,0,1)].' '.$this->discrete[substr($num,1,1)];
	}
	
	//displays three digit numbers
	private function threedigits($num)
	{
		return $this->discrete[substr($num,0,1)].' hundred and '.$this->twodigits(substr($num,1,2));
	}
	
	private function decider($num)
	{
		if(strlen($num)<=2)
			return $this->twodigits($num);
		else
			return $this->threedigits($num);
	}
	
	public function convert($num)
	{
		//return if more than 48 digits
		if(strlen($num)>48) 
		{
			$this->error="Number out of bounds";
			return $this->error;
		}
		
		//check if first 
		if(substr($num,0,1)=="-")
		{
			$this->sentence.='minus ';
			$num=substr($num,1,strlen($num)-1);
		}
		
		if(strlen($num)<=3)
		{
			$this->sentence.=$this->decider($num);
		}
		else
		{
			$k=strrev($num);
			for($i=0;$i<strlen($k);$i=$i+3){$arro[]=strrev(substr($k,$i,3));}
			//reverse again
			$arro=array_reverse($arro);
			//print_r($arro);
			$mool=ceil(strlen($num)/3);
			if((strlen('num')%3)==0){$mool--;}
			$this->sentence.=$this->decider($arro[0]).' '.$this->mool_array[$mool];
			$mool--;
			//leave the first one and prepare string of others
			$arrlen=count($arro);
			for($i=1;$i<$arrlen;$i++)
			{
				$this->sentence.=' '.$this->decider($arro[$i]);
				if($mool!=0)
				{
					$this->sentence=' '.$this->sentence.' '.$this->mool_array[$mool];
				}
				$mool--;
			}
		}
		return ucfirst(trim($this->sentence));
	}
}
?>
