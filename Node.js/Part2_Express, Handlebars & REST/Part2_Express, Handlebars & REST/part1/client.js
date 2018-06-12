var net = require('net');
var colors = require('colors');
var _ = require('underscore');
var readline = require('readline');

var rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

var readMessage = function(client) {
    rl.question("Enter Command: ", function(line) {
        client.write(line);
        if (line == "bye")
            client.end();
        else
            readMessage(client);
    });
};

var client = net.connect({ port: 3000 },
    function() {
        console.log("Connected to server");
        readMessage(client);
    });

client.on('end', function() {
    console.log("Client disconected...");
    //return;
});
client.on('data', function(data) {
    console.log("\n ...Recieved", "\n", data.toString());
});