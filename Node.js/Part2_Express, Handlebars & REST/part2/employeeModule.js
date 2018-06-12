var colors = require('colors');
var _ = require('underscore');

var myObj = [
    { id: 1, firstName: 'John', lastName: 'Smith' },
    { id: 2, firstName: 'Jane', lastName: 'Smith' },
    { id: 3, firstName: 'John', lastName: 'Doe' }
];
global.myObj = myObj;

var f1 = function(myObj, value) {
    return _.findWhere(myObj, { id: value });
};

var f2 = function(myObj, value) {
    var result = _.where(myObj, { lastName: value });
    return result;
};

var f3 = function(firstName, lastName) {
    var count = _.pluck(myObj, 'id');
    var max = _.max(count, function(count) { return count + 1; });
    return myObj.push({
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