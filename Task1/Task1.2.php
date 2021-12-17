<?php
/* PHP program to verify the input string is a palindrome.
The function verifies the input string is a palindrome. 
*/
function palindrome_check($string) {
	//Checking for null, empty or blank space.
	if (empty($string) || empty(trim($string,' ')))
		{
			echo ("The given string is empty. \n\n");
			return;
		}
	
	//Making case insensitive
	$newstring = strtoupper($string);
	$revString = strrev($newstring);
	if ($revString == $newstring)
	{
		echo ('"' . $string.'"'." is a palindrome.\n\n");
	} else 
	{
		echo ('"' . $string.'"'."  is not a palindrome.\n\n");
	}

	
}

echo("Task 1.2 Function  Description:  The function verifies the input string is a palindrome.\n");
//Test for Task 1.2
echo ("Test for Task 1.2: \n");
//Positive Scenarios:
echo ("Positive Scenarios: \n");
/*Scenario 1
Verify if input string is a palindrome, it should give message that “The given string is palindrome.”
*/
echo ("Scenario 1: \nVerify if input string is a palindrome, it should give message that “The given string is palindrome.”.\n\n");
//Scenario 1.1: a> When input is ‘MALAYALAM’, it should give message that “The given string is palindrome.”
echo ("Scenario 1.1: a> When input is ‘MALAYALAM’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("MALAYALAM");

//Scenario 1.1: b> When input is ‘iTopiNonAvevAnoNipoTi’, it should give message that “The given string is palindrome.”
echo ("Scenario 1.1: b> When input is ‘iTopiNonAvevAnoNipoTi’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("iTopiNonAvevAnoNipoTi");

//Scenario 1.2: When input is single character like ‘a’, it should give message that “The given string is palindrome.”
echo ("Scenario 1.2: When input is single character like ‘a’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("a");

//Scenario 1.3: When input is with space ‘rac car’, it should give message that “The given string is palindrome.”
echo ("Scenario 1.3: When input is with space ‘rac car’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("rac car");

/*Scenario 2
Verify if input string is a palindrome and has different case characters, it should identify the string as palindrome and should give message that “The given string is palindrome.”
*/
echo ("Scenario 2: \nVerify if input string is a palindrome and has different case characters, it should identify the string as palindrome and should give message that “The given string is palindrome.”.\n\n");
//Scenario 2.1: When input is ‘MALAYALAM’, it should give message that “The given string is palindrome.”
echo ("Scenario 2.1: When input is ‘Sator Arepo Tenet Opera Rotas’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("Sator Arepo Tenet Opera Rotas");

/*Scenario 3
Verify if input string has special character, it should give message that “The given string is palindrome.”
*/
echo ("Scenario 3: \nVerify if input string has special character, it should give message that “The given string is palindrome.”.\n\n");
//Scenario 3.1: When input is ‘dei&&ied’, it should give message that “The given string is palindrome.”
echo ("Scenario 3.1: When input is ‘dei&&ied’, it should give message that “The given string is palindrome.” \nResult:  ");
palindrome_check("dei&&ied");

echo ("Negative Scenarios: \n");
/*Scenario 4
Verify if input string is not a palindrome, it should give message that “The given string is not a palindrome.”
*/
echo ("Scenario 4: \nVerify if input string is not a palindrome, it should give message that “The given string is not a palindrome.”.\n\n");
//Scenario 4.1: a> When input is ‘antenna’, it should give message that “The given string is palindrome.”
echo ("Scenario 4.1: When input is ‘antenna’, it should give message that “The given string is not a palindrome.” \nResult:  ");
palindrome_check("antenna");

//Scenario 4.2: a> When input is not palindrome due to space like ‘race car, it should give message that “The given string is not a palindrome.”
echo ("Scenario 4.2: a> When input is not palindrome due to space‘race car, it should give message that “The given string is not a palindrome.” \nResult:  ");
palindrome_check("race car");

//Scenario 4.2: b> When input is not palindrome due to space like ‘A man, a plan, a canal, Panama’, it should give message that “The given string is palindrome.”
echo ("Scenario 4.2: b> When input is not palindrome due to space like  ‘A man, a plan, a canal, Panama’, it should give message that “The given string is not a palindrome.”\nResult:  ");
palindrome_check("A man, a plan, a canal, Panama");

/*Scenario 5
Verify if input string is null, it should give message that “The given string is empty.”
*/
echo ("Scenario 5: \nVerify if input string is null, it should give message that “The given string is empty.”.\n\n");
//Scenario 5.1: When input is null, it should give message that “The given string is empty.”
echo ("Scenario 5.1: When input is null, it should give message that “The given string is empty.” \nResult:  ");
palindrome_check(null);


/*Scenario 6
Verify if input string is empty, it should give message that “The given string is empty.”
*/
echo ("Scenario 6: \nVerify if input string is empty, it should give message that “The given string is empty.”.\n\n");
//Scenario 6.1: Verify if input string is empty, it should give message that “The given string is empty.”
echo ("Scenario 6.1: Verify if input string is empty, it should give message that “The given string is empty.” \nResult:  ");
palindrome_check('');

//Scenario 6.2: When input is ‘ ’, it should give message that “The given string is empty.”
echo ("Scenario 6.2: When input is ‘ ’, it should give message that “The given string is empty.” \nResult:  ");
palindrome_check(' ');




?>