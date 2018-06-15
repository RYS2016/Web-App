var DB = require('./nameDBConnection.js');
var Name = DB.getModel();

module.exports =
    function displayNames(req, res, next) {
        Name.find({}, function(err, names) {
            if (err)
                console.log("Error : %s ", err);

            var results = names.map(function(name) {
                return {
                    id: name._id,
                    firstName: name.firstName,
                    lastName: name.lastName
                };
            });
            res.render('displayNamesView', { title: "List of Data", data: results });
        });
    };