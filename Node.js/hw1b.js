var foo = require('./employeeEmitter');
var colors = require('colors');

var employeeEmitter = new foo([
    { id: 1, firstName: 'John', lastName: 'Smith' },
    { id: 2, firstName: 'Jane', lastName: 'Smith' },
    { id: 3, firstName: 'John', lastName: 'Doe' }
]);

var text = 'Lookup by last name (Smith)';
console.log(text.red);

employeeEmitter.on('lookupByLastName', function(arg) {
    var isider = 'Event lookupByLastName raised! Smith';
    console.log(isider.cyan);
    console.log(arg);
});

employeeEmitter.lookupByLastName();

var text2 = 'Adding Employee William Smith';
console.log(text2.red);
employeeEmitter.on('addEmployee', function(arg) {
    var insider = 'Event addEmployee raised! William, Smith';
    console.log(insider.cyan);
});

employeeEmitter.addEmployee();

var text3 = 'Lookup by last name (Smith)';
console.log(text3.red);

employeeEmitter.lookupByLastName('Smith');

var text = 'Lookup by id (2)';
console.log(text.red);

employeeEmitter.on('lookupById', function(arg) {
    var text = 'Event lookupById raised! 2';
    console.log(text.cyan);
    console.log(arg);
});
employeeEmitter.lookupById();