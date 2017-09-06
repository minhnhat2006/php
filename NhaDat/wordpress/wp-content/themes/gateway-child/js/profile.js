jQuery(document).ready(function($) {

var currency = '#currency';
$(currency).selectmenu();
$(currency).val($(currency).attr("value"));
  $(currency).selectmenu("refresh");

} );