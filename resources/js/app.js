require('./bootstrap');
global.$ = global.jQuery = require('jquery');
var dt = require('datatables.net')();
window.$.DataTable = dt;

var moment = require('moment');
  
console.log(moment().format());

require('sweetalert2');
