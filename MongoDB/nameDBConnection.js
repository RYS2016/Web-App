var mongoose = require('mongoose');
var dbUrl = 'mongodb://127.0.0.1:27017/cs602db';

var connection = mongoose.createConnection(dbUrl);

var nameDB = require('./nameDB.js');
var Name = nameDB.getModel(connection);


connection.on("open", function() {
    var name;

    name = new Name({
        firstName: 'John',
        lastName: 'Smith'
    });
    name.save();

    name = new Name({
        firstName: 'Jane',
        lastName: 'Smith'
    });
    name.save();

    name = new Name({
        firstName: 'John',
        lastName: 'Doe'
    });
    name.save();

    Name.find({},
        function(err, results) {
            connection.close();
            if (err) throw err;
            console.log("Success!!!");
            console.log(results);

        });
});