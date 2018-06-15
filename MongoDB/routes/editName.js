var DB = require('./namedbConnection.js');
var Name = DB.getModel();

module.exports =
    function editCourse(req, res, next) {
        var id = req.params.id;

        Course.findById(id, function(err, name) {
            if (err)
                console.log("Error Selecting : %s ", err);
            if (!name)
                return res.render('404');
            res.render('editNameView', {
                title: "Edit Name",
                data: {
                    id: name._id,
                    firstName: name.firstName,
                    lastName: name.lastName
                }
            });
        });
    };