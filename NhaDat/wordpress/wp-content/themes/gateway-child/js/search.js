jQuery(document).ready(function($) {

	var sort = '#sort';
	$(sort).selectmenu();
	$(sort).val($(sort).attr("value"));
    $(sort).selectmenu("refresh");

	var khuvuc = '#khuvuc';
	$(khuvuc).selectmenu();
	$(khuvuc).val($(khuvuc).attr("value"));
    $(khuvuc).selectmenu("refresh");

	var loaibds = "#loaibds";
    $(loaibds).selectmenu();
    $(loaibds).val($(loaibds).attr("value"));
    $(loaibds).selectmenu("refresh");

    var sophongngu = "#sophongngu";
    $(sophongngu).selectmenu();
    $(sophongngu).val($(sophongngu).attr("value"));
    $(sophongngu).selectmenu("refresh");

	var sophongtam = "#sophongtam";
    $(sophongtam).selectmenu();
    $(sophongtam).val($(sophongtam).attr("value"));
    $(sophongtam).selectmenu("refresh");

    $( "#slider-range" ).slider({
      orientation: "horizontal",
      range: true,
      values: [ 1, 100 ],
      slide: function( event, ui ) {
        $( "#amount" ).text( ui.values[ 0 ] + " triệu - " + ui.values[ 1 ] + " triệu" );
      }
    });
    $( "#amount" ).text( $( "#slider-range" ).slider( "values", 0 ) + " triệu" +
      " - " + $( "#slider-range" ).slider( "values", 1 ) + " triệu" );
} );