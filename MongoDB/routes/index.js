var express = require('express');
var router = express.Router();

// other modules
var displayNames = require("./displayNames");
var addName = require("./addName");
var deleteName = require("./deleteName");
var editName = require("./editName");


var saveName = require("./saveName");
var saveAfterEdit = require("./saveAfterEdit");


// router specs
router.get('/', function(req, res, next) {
    res.redirect('/names');
});

router.get('/names', displayNames);
router.get('/names/add', addName);
router.post('/names/add', saveName);
router.get('/names/edit', editName);
router.post('/names/edit', saveAfterEdit);
router.get('/names/delete', deleteName);


module.exports = router;