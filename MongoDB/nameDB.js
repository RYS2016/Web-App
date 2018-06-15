var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var nameSchema = new Schema({
    firstName: String,
    lastName: String
});

module.exports = {
    getModel: function getModel(connection) {
        return connection.model("NameModel", nameSchema);
    }
};