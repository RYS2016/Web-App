var colors = require('colors');
var _ = require('underscore');

var data = [
    { id: 1, firstName: 'John', lastName: 'Smith' },
    { id: 2, firstName: 'Jane', lastName: 'Smith' },
    { id: 3, firstName: 'John', lastName: 'Doe' }
];
global.data = data;

var f1 = function(data, value) {
    return _.findWhere(data, { id: value });
};

var f2 = function(data, value) {
    var result = _.where(data, { lastName: value });
    console.log(result);
};

var f3 = function(firstName, lastName) {
    var count = _.pluck(data, 'id');
    var max = _.max(count, function(count) { return count + 1; });
    data.push({
        id: max + 1,
        firstName: firstName,
        lastName: lastName
    });
};

module.exports = {
    lookupById: f1,
    lookupByLastName: f2,
    addEmployee: f3
};