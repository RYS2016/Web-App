var DB = require('./namedbConnection.js');
var Name = DB.getModel();

module.exports =
    function saveName(req, res, next) {
        var id = req.params.id;

        Name.findById(id, function(err, name) {
            if (err)
                console.log("Error Selecting : %s ", err);
            if (!name)
                return res.render('404');

            name.firstName = req.body.cfname;
            name.lastName = req.body.clname;
            if (people.length > 0) {
                people =
                    people.split(',').map(function(elem) {
                        var names = elem.trim().split(' ');
                        return {
                            firstName: names[0],
                            lastName: names[1]
                        };
                    });
            }

            name.save(function(err) {
                if (err)
                    console.log("Error updating : %s ", err);
                res.redirect('/names');
            });
        });
    };