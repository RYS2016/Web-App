var DB = require('./namedbConnection.js');
var Name = DB.getModel();

module.exports =
    function saveName(req, res, next) {

        var people = req.body.cdev;
        // create an array of objects
        if (people.length > 3) {
            people =
                people.split(',').map(function(elem) {
                    var names = elem.trim().split(' ');
                    return {
                        firstName: names[0],
                        lastName: names[1]
                    };
                });
        } else
            people = [];

        var name = new Name({
            firstName: req.body.cfname,
            lastName: req.body.clname
        });

        course.save(function(err) {
            if (err)
                console.log("Error : %s ", err);
            res.redirect('/names');
        });

    };