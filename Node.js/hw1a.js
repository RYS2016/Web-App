var foo = require('./employeeModule');

foo.lookupByLastName(data, 'Smith');

var text = 'Adding employee William Smith';

console.log(text.rainbow);

foo.addEmployee('William', 'Smith');

foo.lookupByLastName(data, 'Smith');

console.log(foo.lookupById(data, 2));

var f4 = foo.lookupById(data, 2);

var text2 = 'Changing first name...';

console.log(text2.rainbow);

function setName(firstName) {
    f4.firstName = firstName;
}
setName('Mary');

console.log(foo.lookupById(data, 2));

foo.lookupByLastName(data, 'Smith');