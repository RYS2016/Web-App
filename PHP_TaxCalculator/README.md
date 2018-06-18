Write a single PHP script, income_tax_v1.php, with the following functionality:

The script will first prompt the user to enter a gross annual income. Upon receiving any valid numeric (integer or float/double) 
value from the form, the script will then calculate the corresponding income tax based on the following tables:

Source: https://www.irs.com/articles/projected-us-tax-rates-2016

After the user enters the income, say 150000, the view of the application is as shown below. The input form along with the results should be 
displayed.

Hard-code the table values in the conditional statements and the income tax calculations, i.e., don’t define constants to use in the functions. 
The form data is submitted using the POST method.
Write a single PHP script, income_tax_v2.php, with the following functionality:

Define the TAX_RATES using PHP7 array syntax 

This function should not hard code any of the tax table information.

For example, for a taxable income of 50000, the above index value would be 2 for Single, 1 for Married_Jointly, 
\2 for Married_Separately, and 1 for Head_Household.
 
The script should also display the tax tables using the above TAX_RATES data.
