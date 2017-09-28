(function( $ ) {
    var win = $(window);

    // Each time the user scrolls

        win.scroll(function() {
        // End of the document reached?
        if ($(document).height() - win.height() == win.scrollTop() &&     waveJS.infiniteScroll  ) {

        }

        $(".more").live("click", function(){
            waveJS.paged= waveJS.paged+1;
            waveJS.refreshTable({s:$("#wave_search").val(), sf:$("#wave_search_options").val(), paged:  waveJS.paged+1});
        });
    });
})( jQuery );;