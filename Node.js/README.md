Part 1a – Node.js Modules

Write a Node.js module, employeeModule.js, with the following functionality. The module maintains an array of JavaScript objects, 
each with the property firstName, lastName , and a unique id value. For example, a sample initial data is shown below.




The module should export the functions lookupById, lookupByLastName, and addEmployee. Use the underscore module and use the functions 
findWhere, where, pluck, and max in the implementation. The function lookupById should return the JavaScript object from the data whose
id matches the specified argument. If the specified id is not present, undefined is returned. The function lookupByLastName should 
return the array of JavaScript objects from the data whose lastName matches the specified argument. If the specified lastName is not 
present, [] is returned. The function addEmployee only takes two arguments, the firstName and lastName of the employee being added. 
The id value should be calculated as one more than the current maximum id.

Now, write the application, hw1a.js, using the functionality of the above module. Write the code to do the following:

•	Lookup by last name, Smith, and print the results.

•	Add a new employee with first name, William, and last name, Smith.
•	Lookup by last name, Smith, and print the results.
•	Lookup by id, 2, and assign the value to a variable.
•	Print the variable.
•	Using the above variable, change the first name to Mary.
•	Lookup again by id, 2, and print the result.
•	Lookup by last name, Smith, and print the results.

Now, in the file hw1aFixes.txt, discuss how you can prevent the changes done by the user on the objects returned by the module 
functions not reflect on the module data itself. For example, even after user changes the first name, the lookup should return the
original result. Is this the only function, or the lookupByLastName function also has this problem?
 
Part 2b – Node.js Events 

Write a Node.js module, employeeEmitter.js, with the following functionality. Provide the EmployeeEmitter class inheriting from the 
EventEmitter. The constructor function takes one argument and saves it as the instance variable data. Provide the functions lookupById, 
lookupByLastName, and addEmployee for the EmployeeEmitter prototype. The first line in these methods should emit the respective event 
(same name as the function) along with the arguments supplied for the function. The rest of the code in each of the functions should be 
the same as in Part1. From the module, export one property EmployeeEmitter referencing the constructor function.

Now, write the application, hw1b.js, using the functionality of the above module. Write the code to do the following:

•	Using the same array data as in Part1, create the EmployeeEmitter object using the array data as its argument.

•	Write three event handlers for the three events that could be emitted by the three functions. See the sample output for the behavior 
of these handlers. Now, using the EmployeeEmitter object, do the following operations.
•	Lookup by last name, Smith, and print the results.

•	Add a new employee with first name, William, and last name, Smith.
•	Lookup by last name, Smith, and print the results.
•	Lookup by id, 2, and print the result.

The sample output of the application is shown below. You can optionally use the colors module for colors in the output.
 
