var EventEmitter = require('events').EventEmitter;
var inherits = require('util').inherits;
var _ = require('underscore');

function employeeEmitter(arg) {
    this.data = arg;
    EventEmitter.call(this);
}
inherits(employeeEmitter, EventEmitter);

employeeEmitter.prototype.lookupByLastName = function() {
    this.emit('lookupByLastName', _.where(this.data, { lastName: 'Smith' }));
};

employeeEmitter.prototype.addEmployee = function() {
    var count = _.pluck(this.data, 'id');
    var max = _.max(count, function(count) { return count + 1; });
    this.data.push(({ id: 4, firstName: 'William', lastName: 'Smith' }));
    this.emit('addEmployee', this.data);
};

employeeEmitter.prototype.lookupByLastName = function() {
    this.emit('lookupByLastName', _.where(this.data, { lastName: 'Smith' }));
};

employeeEmitter.prototype.lookupById = function() {
    this.emit('lookupById',
        _.findWhere(this.data, { id: 2 }));
};

module.exports = employeeEmitter;