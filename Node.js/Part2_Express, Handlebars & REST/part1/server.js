var colors = require('colors');
var _ = require('underscore');
var net = require('net');

var foo = require('./employeeModule');

var server = net.createServer(
    function(socket) {
        console.log("Client connection...");

        socket.on('end', function() {
            console.log("Client disconected...");
        });

        socket.on('data', function(data) {
            console.log("...Recieved:", data.toString()); //process data from client
            if (data == "lookupByLastName Smith") {
                var ln = foo.lookupByLastName(myObj, 'Smith');
                var myJSON = JSON.stringify(ln);
                socket.write(myJSON);
            } else if (data == "addEmployee William Smith") {
                var addEmp = foo.addEmployee('William', 'Smith');
                var mySecondJSON = JSON.stringify(addEmp);
                socket.write(mySecondJSON);
            } else if (data == "lookupById 4") {
                var lookId = foo.lookupById(myObj, 4);
                var myThirdJSON = JSON.stringify(lookId);
                socket.write(myThirdJSON);
            }
        });
    });

server.listen(3000, function() {
    console.log("Listen for connection");
});