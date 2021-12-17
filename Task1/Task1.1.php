<?php
/* PHP program to calculate Multiplies of 4, 6 & both
The function takes two arrays of numbers as parameters and returns the number of values that are a multiplier of numbers (4, 6 or both as per requirement) in second array ($multipleof) from first array ($arr). 
*/
function multiplier_check($arr, $multipleof)
{
	$multiples = array();
	$min = -9899999999999990000;
	$max = 9899999999999999999;
	$string = implode(", ", $arr);
	if (empty($arr))
		{
			echo ("Array is empty. Please enter some valid numbers. \n\n");
			return;
		}
		
	//Sanitizing input array, filters out value which is not whole number. 
	$arrayOfWholeNumberValues = array();
	$arrayOfNonWholeNumberValues = array();
	$arrayOfOverflowNumbers = array();
	foreach ($arr as $elem) 
	{
		if (is_numeric( $elem ) && floor( $elem ) == $elem)
		{
			array_push($arrayOfWholeNumberValues, $elem);
		}
		else
		{
			array_push($arrayOfNonWholeNumberValues, $elem);
		}
	}
	
	if (sizeof($arrayOfWholeNumberValues)>=1)
		foreach ($arrayOfWholeNumberValues as $elem) 
		{			
				//Limiting big length number
				if($elem>=$min && $elem<=$max)
				{
					//Avoiding duplicate number in result
					if (!in_array($elem, $multiples, TRUE))
						foreach ($multipleof as $n)
						{							
							if($elem%$n==0)
							{
								array_push($multiples, $elem);
								break;
							}
						}
				}
				else
					{
						array_push($arrayOfOverflowNumbers, $elem);
					}						
		}
	else
	{
		echo ("Input array is ($string) and does not have whole number. Please enter array with proper whole number. \n\n");
		return;
	}
		
    //Sorting the result
	sort($multiples);
	
	$result = implode(", ", $multiples);
	$resultString = ("The multiples of 4 or 6 in input array ($string)  are ($result) in sorted order.");
	if ((sizeof($arrayOfNonWholeNumberValues)>=1))
	{
		$resultString .= (" The input array contains non whole number value (". implode(", ", $arrayOfNonWholeNumberValues) ."). Please enter array with proper whole number." );
	}
	
	if ((sizeof($arrayOfOverflowNumbers)>=1))
	{
		$resultString .= (" The input array contains big number/s (". implode(", ", $arrayOfOverflowNumbers) ."). Please enter array element within range " .$min ." to " .$max );
	}
	
	echo ("$resultString \n\n");
    return;
}

echo("Task 1.1 Function  Description:  The function takes two arrays of numbers as parameters and returns the number of values that are a multiplier of numbers (4, 6 or both as per requirement) in second array from first array. ");
//Test for Task 1.1 
$n = array(4,6);
echo ("Test for Task 1.1: \n");
//Positive Scenarios:
echo ("Positive Scenarios: \n");
/*Scenario 1
Verify if array of valid whole numbers is entered as a parameter, it should accept the values and return multiplier of either 4 or 6 or both.
*/
echo ("Scenario 1: \nVerify if array of valid whole numbers is entered as a parameter, it should accept the values and return multiplier of either 4 or 6 or both.\n\n");
//Scenario 1.1: All Whole numbers. When input is (1,4,6,7,8,10,16,19,18,20) result should be (4,6,8,16,18,20).
echo ("Scenario 1.1: All Whole numbers. When input is (1,4,6,7,8,10,16,19,18,20) result should be (4,6,8,16,18,20). \nResult:  ");
$arr = array( 1,4,6,7,8,10,16,19,18,20);
multiplier_check($arr,$n);

//Scenario 1.2: When input is single number like (4) result should be (4).
echo("Scenario 1.2: When input is single number like (4) result should be (4). \nResult:  ");
$arr = array( 4);
multiplier_check($arr,$n);

//Scenario 1.3: When input is without any multiples of 4 or 6 like (1,2,3,5,7,10,14,22,115), the function should accept the input and the result should be ().
echo("Scenario 1.3: When input is without any multiples of 4 or 6 like (1,2,3,5,7,10,14,22,115), the function should accept the input and the result should be (). \nResult:  ");
$arr = array(1,2,3,5,7,10,14,22,115);
multiplier_check($arr,$n);

/*Scenario 2
Verify if array of negative whole numbers is entered as a parameter, it should accept the values and return multiplier of either 4 or 6 or both.
*/
echo ("Scenario 2: \nVerify if array of negative whole numbers is entered as a parameter, it should accept the values and return multiplier of either 4 or 6 or both.\n\n");
//Scenario 2.1: When input is (1,-4,6,-7,8,10,16,19,-18,20) result should be (-18,-4,6,8,16,20).
echo("Scenario 2.1: When input is (1,-4,6,-7,8,10,16,19,-18,20) result should be (-18,-4,6,8,16,20). \nResult:  ");
$arr = array(1,-4,6,-7,8,10,16,19,-18,20);
multiplier_check($arr,$n);

//Scenario 2.2: When input is single negative number like (-6) result should be (-6).
echo("Scenario 2.2: When input is single negative number like (-6) result should be (-6).\nResult:  ");
$arr = array(-6);
multiplier_check($arr,$n);

/*Scenario 3
Verify if array with duplicate numbers is entered as a parameter, it should accept the values, return multiplier of either 4 or 6 or both and result should show unique elements only.
*/
echo ("Scenario 3: \nVerify if array with duplicate numbers is entered as a parameter, it should accept the values, return multiplier of either 4 or 6 or both and result should show unique elements only.\n\n");
//Scenario 3.1: When input is (1,1,-4,6,-7,8,10,16,19,-18,20,8,12,-4) result should be (-18,-4,6,8,12,16,20).
echo("Scenario 3.1: When input is (1,1,-4,6,-7,8,10,16,19,-18,20,8,12,-4) result should be (-18,-4,6,8,12,16,20). \nResult:  ");
$arr = array(1,1,-4,6,-7,8,10,16,19,-18,20,8,12,-4);
multiplier_check($arr,$n);

/*Scenario 4
Verify if array with big number like 18/19 digit is entered as a parameter, it should accept the value and function should give expected result.
*/
echo ("Scenario 4: \nVerify if array with big number like 18/19 digit is entered as a parameter, it should accept the value and function should give expected result.\n\n");
//Scenario 4.1: When input includes big number like 18/19 digit, (3,100,-9000000000000000000,10,9000000000000000000,19,18,20) result should be (-9000000000000000000, 18, 20, 100, 9000000000000000000).
echo("Scenario 4.1: When input includes big number like 18/19 digit, (3,100,-9000000000000000000,10,9000000000000000000,19,18,20) result should be (-9000000000000000000, 18, 20, 100, 9000000000000000000). \nResult:  ");
$arr = array(3,100,-9000000000000000000,10,9000000000000000000,19,18,20);
multiplier_check($arr,$n);

//Negative Scenarios:
echo ("Negative Scenarios: \n");
/*Scenario 5
Verify if array with values other than whole number is entered as a parameter. It should show result for all whole numbers which are divisible by 4, 6 or both. And should show message for unacceptable values.
*/
echo ("Scenario 5: \nVerify if array with values other than whole number is entered as a parameter. It should show result for all whole numbers which are divisible by 4, 6 or both. And should show message for unacceptable values.\n\n");
//Scenario 5.1: When input includes decimal numbers, (3,4,8,1.2,80,8.8,20,20.4,60.1,60.6,60.4) it should show result for all whole numbers which are divisible by 4, 6 or both and should also give message “Please enter array with proper whole number.”.
echo("Scenario 5.1: When input includes decimal numbers, (3,4,8,1.2,80,8.8,20,20.4,60.1,60.6,60.4) it should show result for all whole numbers which are divisible by 4, 6 or both (4,8,20,80)and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(3,4,8,1.2,80,8.8,20,20.4,60.1,60.6,60.4);
multiplier_check($arr,$n);

//Scenario 5.2: When input includes string, (5,6,8,7,4,100,30,”apple”) it should show result for all whole numbers which are divisible by 4, 6 or both and should also give message “Please enter array with proper whole number.”.
echo("Scenario 5.2: When input includes string, (5,6,8,7,4,100,30,”apple”) it should show result for all whole numbers which are divisible by 4, 6 or both (4,6,8,30,100) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(5,6,8,7,4,100,30,'apple');
multiplier_check($arr,$n);

//Scenario 5.3: When input includes predefined or special characters, (5,’*’,8,7,4,100,30) it should show result for all whole numbers which are divisible by 4, 6 or both (4,8,30,100) and should also give message “Please enter array with proper whole number.”.
echo("Scenario 5.3: When input includes predefined or special characters, (5,’*’,8,7,4,100,30) it should show result for all whole numbers which are divisible by 4, 6 or both (4,8,30,100) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(5,'*',8,7,4,100,30);
multiplier_check($arr,$n);

//Scenario 5.4: When input includes non-whole numbers ('A', 'b', 'c','*', 4.5, 6.7, 8, 6, 12) it should show result for all whole numbers which are divisible by 4, 6 or both (6, 8, 12) and should also give message “Please enter array with proper whole number.”.
echo("Scenario 5.4: When input includes non-whole numbers ('A', 'b', 'c','*', 4.5, 6.7, 8, 6, 12) it should show result for all whole numbers which are divisible by 4, 6 or both (6, 8, 12) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array('A','b','c','*',4.5,6.7, 8,6,12);
multiplier_check($arr,$n);

/*
Scenario 6 \nVerify if empty array is entered as a parameter.it should not accept the value and give message “Array is empty. Please enter some valid numbers.”.
*/
echo ("Scenario 6: \nVerify if empty array is entered as a parameter. It should not accept the value and give message “Array is empty. Please enter some valid numbers.”.\n\n");
//Scenario 6.1: When input is empty array,  it should give message “Array is empty. Please enter some valid numbers.”.
echo("Scenario 6.1: When input is empty array, () it should give message “Array is empty. Please enter some valid numbers.”\nResult:  ");
$arr = array();
multiplier_check($arr,$n);

/*
Scenario 7 \nVerify if array with null or blank elements is entered as a parameter, it should show result for all whole numbers which are divisible by 4, 6 or both and should also give message “Please enter array with proper whole number.”.
*/
echo ("Scenario 7: \nVerify if array with null or blank elements is entered as a parameter, it should show result for all whole numbers which are divisible by 4, 6 or both and should also give message “Please enter array with proper whole number.”.\n\n");
//Scenario 7.1: When input array includes blank, (3,’’,8,10,16,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 16, 18,20) and should also give message “Please enter array with proper whole number.”.
echo("Scenario 7.1: When input array includes blank, (3,’’,8,10,16,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 16, 18,20) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(3,'',8,10,16,19,18,20);
multiplier_check($arr,$n);

//Scenario 7.2: When input array includes space as value, (3,’ ’,8,10,16,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 16, 18, 20) and should also give message “Please enter array with proper whole number.”.
echo("Scenario 7.2: When input array includes space as value, (3,’ ’,8,10,16,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 16, 18, 20) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(3,' ',8,10,16,19,18,20);
multiplier_check($arr,$n);

//Scenario 7.3: When input array includes null value, (3,100,8,10,null,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 18, 20, 100) and should also give message “Please enter array with proper whole number.”.
echo("Scenario 7.3: When input array includes null value, (3,100,8,10,null,19,18,20) it should show result for all whole numbers which are divisible by 4, 6 or both (8, 18, 20, 100) and should also give message “Please enter array with proper whole number.”\nResult:  ");
$arr = array(3,100,8,10,null,19,18,20);
multiplier_check($arr,$n);

/*
Scenario 8 \nVerify if array with big number is entered as a parameter, it should show result for all whole numbers which are divisible by 4, 6 or both and within the limit -9899999999999990000 to 9899999999999999999 and should also give message “Please enter array element within range -9899999999999990000 to 9899999999999999999.”.
*/
echo ("Scenario 8: \nVerify if array with big number is entered as a parameter, it should show result for all whole numbers which are divisible by 4, 6 or both and within the limit -9899999999999990000 to 9899999999999999999 and should also give message “Please enter array element within range -9899999999999990000 to 9899999999999999999.”.\n\n");
//Scenario 8.1: When input array is (3,100,-9900000000000000000,10,90000000000000000000,19,18,20) it should give result (18, 20, 100) and also show message “Please enter array element within range -9899999999999990000 to 9899999999999999999.”.
echo("Scenario 8.1: When input array is (3,100,-9900000000000000000,10,90000000000000000000,19,18,20) it should give result (18, 20, 100) and also show message “Please enter array element within range -9899999999999990000 to 9899999999999999999.”\nResult:  ");
$arr = array(3,100,-9900000000000000000,10,90000000000000000000,19,18,20);
multiplier_check($arr,$n);

?>