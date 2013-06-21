function validateNumber(value, passing, total) {

//for empty value
if(value == "")
{
	alert("field cannot be empty");	
}
else
{
  // Validate the number
  if(isNaN(value))
   alert("Please enter a number.");

	//for gretear mark error
	if(total < value) 
	  alert("You have entered more than total mark .");
		
	//for student failed	
	if(passing > value)
	 confirm("failed..!!!");	
}	
	}

/*	function compareDate() 
	{	
		var start = document.getElementById("start").value;
		var end = document.getElementById("end").value;
		
		if(start > end)
			alert("End date must be greater than the Start date");
	}
*/
