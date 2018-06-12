var foo = require('./employeeModule');
var underscore = require('underscore');
var express = require('express');
var app = express();
// to parse request body
var bodyParser = require("body-parser");
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
//static sources
app.use(express.static(__dirname + '/public'));
//setup handlebars view engine
var handlebars = require('express-handlebars');
app.engine('handlebars', handlebars({ defaultLayout: 'main' }));
app.set('view engine', 'handlebars');


app.get('/', function(req, res) {
    res.render('home');
});

app.get('/id/:id', function(req, res) {
    res.json(foo.lookupById(myObj, Number(req.params.id)));
});

app.get('/lastName/:lastName', function(req, res) {
    //res.render('lastName');
    res.json(foo.lookupByLastName(myObj, req.params.lastName));
});

app.get('/addEmployee', function(req, res) {
    res.render('newEmployee');
});

app.post('/addEmployee', function(req, res) {
    res.json(foo.addEmployee(req.body.firstName, req.body.lastName));
});

app.listen(3000, function() {
    console.log('localhost:3000');
});