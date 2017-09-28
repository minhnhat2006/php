(function( $ ) {

    $.wave_fancytree_init=function()
    {
        console.log("fancytreeinit2");
        $("#wavetree").fancytree(
            {
                click: function(event, data) {		waveJS.refreshTable({category:data.node.key})},
                extensions: ["dnd"],

            dnd: {
        // Available options with their default:
        autoExpandMS: 1000,   // Expand nodes after n milliseconds of hovering
            draggable: null,      // Additional options passed to jQuery UI draggable
            droppable: null,      // Additional options passed to jQuery UI droppable
            dropMarkerOffsetX: -24,  // absolute position offset for .fancytree-drop-marker
            // relatively to ..fancytree-title (icon/img near a node accepting drop)
            dropMarkerInsertOffsetX: -16, // additional offset for drop-marker with hitMode = "before"/"after"
            focusOnClick: false,  // Focus, although draggable cancels mousedown event (#270)
            preventRecursiveMoves: true, // Prevent dropping nodes on own descendants
            preventVoidMoves: true,      // Prevent dropping nodes 'before self', etc.
            smartRevert: true,    // set draggable.revert = true if drop was rejected

            // Events that make tree nodes draggable
            dragStart:
                function(node, data) {

                    return true;
                },      // Callback(sourceNode, data), return true to enable dnd
            dragStop: null,       // Callback(sourceNode, data)
            initHelper: null,     // Callback(sourceNode, data)
            updateHelper: null,   // Callback(sourceNode, data)

            // Events that make tree nodes accept draggables
            dragEnter:
                function(node, data) {
                    /* data.otherNode may be null for non-fancytree droppables.
                     * Return false to disallow dropping on node. In this case
                     * dragOver and dragLeave are not called.
                     * Return 'over', 'before, or 'after' to force a hitMode.
                     * Return ['before', 'after'] to restrict available hitModes.
                     * Any other return value will calc the hitMode from the cursor position.
                     */
                    // Prevent dropping a parent below another parent (only sort
                    // nodes under the same parent):
//    if(node.parent !== data.otherNode.parent){
//      return false;
//    }
                    // Don't allow dropping *over* a node (would create a child). Just
                    // allow changing the order:
//    return ["before", "after"];
                    // Accept everything:
                    // console.log("enter"  +node + data.node);
                    return true;
                },      // Callback(targetNode, data)
            dragExpand: null,     // Callback(targetNode, data), return false to prevent autoExpand
            dragOver: null,       // Callback(targetNode, data)
            dragDrop: function(node, data) {
                /** This function MUST be defined to enable dropping of items on
                 *  the tree.
                 */
                // console.log("dest");
                // console.log( node   );
                // console.log("source");
                //console.log( data.node.parent.key    );
                console.log( data.hitMode     );
                console.log( data.node.parent.key     );
                 var destId=  data.node.key ;
                 var sourceId=  data.otherNode.key ;
                if ( data.node.parent.key =="root_1" && data.hitMode !="over") destId="0";
                var waveajaxdata = {
                    'action': 'wave_move_category_dnd_action',
                    'wave_nonce':ajax_object.wave_nonce,
                    'sourceCategory': sourceId     ,
                    'destCategory':destId
                };
                //console.log(ajaxdata);

                jQuery.post(ajax_object.ajax_url, waveajaxdata, function(response) {
                  if (response>0) data.otherNode.moveTo(node, data.hitMode);

                });

            },       // Callback(targetNode, data)
            dragLeave: null       // Callback(targetNode, data)
            }

            }

            );

    }

})( jQuery );
