(function( $ ) {
	//'use strict';


 $("#resetAllProducts").click(function() { waveJS.refreshTable()  });
    $.wave_fancytree_init();
    $("#searchbutton").click(function (event){waveJS.refreshTable({s:$("#wave_search").val(), sf:$("#wave_search_options").val()}); })
    $("#resetbutton").click(function (event){$("#wave_search").val(""); $("#wave_search_options").val("");waveJS.refreshTable({s:"", sf:""}); })
 $("#wave_search").keyup(function(event){
    if(event.keyCode == 13){
      waveJS.refreshTable({s:$("#wave_search").val(), sf:$("#wave_search_options").val()});
    }
}); 

$('#wave_layout').height( $("#wpcontent").outerHeight()  );

$('#wave_layout').layout( );

var select =    $('#wave_search_options');
var newOptions = {'':'',
                'sku' : 'sku',
                'title' : 'title'};  
$('option', select).remove();
$.each(newOptions, function(text, key) { var option = new Option(key, text);select.append($(option));});
 

  waveJS = {
	 table: $('#wave_table') ,
	
	refreshTable: function(args ) {
	       waveJS.infiniteScroll=false;
        if (args)
		{
        if (!args.hasOwnProperty("category")) args.category = waveJS.category; else waveJS.category=args.category;
        if (!args.hasOwnProperty("s")) args.s = waveJS.s; else waveJS.s=args.s;
        if (!args.hasOwnProperty("sf")) args.sf = waveJS.sf; else waveJS.sf=args.sf;
        if (!args.hasOwnProperty("paged")) args.paged =0;
		}
		else
		{
			 args ={category:""}
		}
        $('.waiting').show();
		        
        var data = {
		'action': 'wave_get_category_products_action',
		'wave_nonce':ajax_object.wave_nonce,
		'category': args.category     , 
        's':args.s,
        'sf':args.sf,
        'paged':args.paged,
	};
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
	jQuery.post(ajax_object.ajax_url, data, function(response) {
 
 if(args.paged==0) { $( waveJS.table).empty();   waveJS.paged=0}

 var n=99999;var initial=0;
 var countmax=parseInt(response.data.countmax.publish ) + parseInt(response.data.countmax.draft) + parseInt(response.data.countmax.pending);



     if (   countmax<10000) {n=9999; }
     if (   countmax<1000) {n=999;}
     if (   countmax<100) {n=99;}
     if (   countmax<10) {n=9 ;}

var ul = $('<ul>').appendTo( waveJS.table);
  //$("#count").html(response.data.count);


if (args.paged<1)
{
    $('#count').removeClass('counter-analog');
    $('#count').addClass('counter-analog').counter({
        initial:response.data.count,
        direction: 'up',
        interval: '0.1',
        format:n,
        stop: response.data.count
    });
    $('.counter-analog').counter('reset');
}

$('.more').remove();
$(response.products).each(function(index, item) {
    
    ul.append(
        $(document.createElement('li')).html(
            '<a href="' + item.link + '">' +
            '<img src="' + item.image  + '" width="150" height="150">' +
            '[' + item.sku  + "]" +
            item.name +  
            "</a>"
           
        )
    );
});

        if (response.data.count> response.products.length ) {
            waveJS.infiniteScroll=true;
            $( '<div class="more"></div>').insertAfter(ul);
        }
//console.log(response.data.count + "-"+  response.products.length + "-" +waveJS.infiniteScroll)
        $('.waiting').hide();
		 
	});
	}
}    
	 
 
})( jQuery );
