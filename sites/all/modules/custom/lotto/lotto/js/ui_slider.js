jQuery(function() {
        jQuery( "#range-slider" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                jQuery( 'input[name="range_start"]' ).val( ui.values[ 0 ] );
                jQuery( 'input[name="range_end"]' ).val( ui.values[ 1 ] );
            }
            })
});


