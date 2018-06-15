module.exports =
    function addName(req, res, next) {
        res.render('addNameView', { title: "Add a Name" });
    };