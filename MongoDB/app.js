var express = require('express');
var bodyParser = require('body-parser');
var handlebars = require('express-handlebars');

var app = express();

var mongoose = require('mongoose');

mongoose.Promise = global.Promise;

var mongoDB = 'mongodb://127.0.0.1:27017/cs602db';
mongoose.connect(mongoDB, {
    useMongoClient: true
});
var db = mongoose.connection;
db.on('error', console.error.bind(console, 'MongoDB connection error:'));



app.engine('handlebars', handlebars({ defaultLayout: 'main-logo' }));
app.set('view engine', 'handlebars');

app.use(express.static(__dirname + '/public'));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

var routes = require('./routes/index');
app.use('/', routes);

app.use(function(req, res) {
    res.status(404);
    res.render('404');
});

app.listen(3000, function() {
    console.log('http://localhost:3000');
});