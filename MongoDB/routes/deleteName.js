var DB = require('./namedbConnection.js');
var Name = DB.getModel();

module.exports =
    function deleteName(req, res, next) {
        var id = req.params.id;

        Name.findById(id, function(err, name) {
            if (err)
                console.log("Error Selecting : %s ", err);
            if (!name)
                return res.render('404');

            name.remove(function(err) {
                if (err)
                    console.log("Error deleting : %s ", err);
                res.redirect('/names');
            });
        });
    };