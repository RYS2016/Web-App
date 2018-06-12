
Part 1 – net Module

Using the employeeModule.js, write the server application (server.js) and the client application (client.js) using the net module. 
The clients communicate with the server using the following commands:

•	lookupByLastName <last name>
•	addEmployee <first name> <last name>
•	lookupById <id>

The server application listens for client connections and when the client command is received, processes the request by invoking 
the corresponding function available through the employeeModule. The server then uses JSON.stringify to send the result back to 
the client.The client application reads commands from the user in a loop and sends the commands to the server. When the data is 
received from the server, the result is printed to the console.The first client invocation should test the following by reading 
the user’s commands:

•	lookupByLastName Smith
•	addEmployee William Smith
•	lookupByLastName Smith

The first client is then disconnected from the server.
The second client invocation should test the following by reading the user’s commands:

•	lookupById 4

The sample output of the server and client applications is shown below. You can optionally use the colors module for colors in the output.

Part 2 – Express, Handlebars & REST 

Create a subfolder part2 and write the following files. Install the Node modules express, express-handlebars, body-parser, and underscore as required. Copy the employeeModule.js from Module1 assignment. Using the employeeModule.js, write the Express server application (server.js) to do the following:

•	GET request –  /
•	GET request –  /id/:id

Should be capable of handling json, xml, and html requests.
Use the employeeModule to lookup the employee for the request parameter.
For html request, render the employee view passing the id and the employee as the model.
•	GET request –  /lastName/:name
Should be capable of handling json, xml, and html requests.
Use the employeeModule to lookup the employees for the request parameter.
For html request, render the employeeList view passing the name and the employees as the model

•	GET request – /addEmployee Render the newEmployee view.
•	POST request –  /addEmployee

Use the employeeModule to add the employee data from the request body.
Redirect the user to /lastName/<last name provided by user>

For the views, use the handlebars view engine using the default layout main.handlebars. The default layout can include your 
favorite image, a heading with your name, and a link for/addEmployee. The employeeList.handlebars iterates over the employees 
and displays the information for each employee. Styling is optional. The employee.handlebars shows the information for the selected employee. The newEmployee.handlebars shows 
the form for submitting the first name and last name for the new employee. The POST action for this form should be /addEmployee.
