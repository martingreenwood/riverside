var $j = jQuery;

/*=================================
=            JS SLIDER            =
=================================*/
/*
$j(function(){

    $j('.slide:gt(0)').hide(); // hide all but first element

    var i=0;
    var t;
    var stop=false;
    var n=$j('.slide').length;

    function a(){
       $j('.slide').eq(i%n).fadeTo(900,1).siblings('.slide').fadeTo(900,0);
    }

    function aa(){
       if(stop){return;}         
       clearTimeout(t);    
       t = setTimeout(function(){i++;a();aa();},7000);
    }
    aa();

    //function h(){
    //  hh=stop ? $j('.slide').eq(i).addClass('hovered') : $j('.hovered').removeClass('hovered');
    //}

    //$j('#slider').bind('mouseenter mouseleave', function(e){
    //   mo=(e.type==='mouseenter')?(stop=true,clearTimeout(t),h()):(stop=false,h(),aa());
    //});

});
*/

$j(function($){

	var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
		$("body").append(appendthis);
		$(".modal-overlay").fadeTo(500, 0.7);
		//$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
	});

	$(".js-modal-close, .modal-overlay").click(function() {
		$(".modal-box, .modal-overlay").fadeOut(500, function() {
			$(".modal-overlay").remove();
		});
	});

	$(window).resize(function() {
		$(".modal-box").css({
			top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
			left: ($(window).width() - $(".modal-box").outerWidth()) / 2
		});
	});

	$(window).resize();
 
});

/*===================================
=            MatchHeight            =
===================================*/

$j(function() {
    $j('.block .column').matchHeight();
});


/*====================================
=            Slick Slider            =
====================================*/

$j(function() {
    $j('.slick').slick({
        infinite: true,
        dots: false,
        infinite: true,
        fade: true,
        speed: 800
    });
});

/*==================================
=            Datepicker            =
==================================*/

/*
$j(function() {
    $j( "#start_date" ).pickadate({
        format: 'dd/mm/yyyy'
    });

    $j( "#departure_date" ).pickadate({
        format: 'dd/mm/yyyy'
    });
});
*/

$j(function() {

    // Depart date
    var endDate = $j('#departure_date').pickadate({
        today: '',
        clear: '',
        close: '',
        formatSubmit: 'dd/mm/yyyy',
        hiddenName: true,
        min: new Date('today'),
        //onClose: function(endDate) {
            //var departDate = this.get('select', 'dd/mm/yyyy');
            //console.log('Depart on ' + departDate);
            //$j('#depart_date_full').val(departDate);

            //var date1 = $j('#arrival_date_full').val();
            //var date2 = $j('#depart_date_full').val();
            //var date1a = new Date(date1);
            //var date2a = new Date(date2);
            //var lengthOfStay = getDateDiff(date1a, date2a, 'days');
            //$j('#search_period').val(departDate);

            //var weekday = new Array(7);
            //weekday[0]=  "Sunday";
            //weekday[1] = "Monday";
            //weekday[2] = "Tuesday";
            //weekday[3] = "Wednesday";
            //weekday[4] = "Thursday";
            //weekday[5] = "Friday";
            //weekday[6] = "Saturday";
            //var dayName = weekday[date1a.getDay()];

            //$j('#arrival_date_day_of_week').val(dayName);
        //}

    });
    
    var picker_end_date = endDate.pickadate('picker');

    // Arive date, onset change enddate
    var startDate = $j('#start_date').pickadate({
        today: '',
        clear: '',
        close: '',
        formatSubmit: 'dd/mm/yyyy',
        hiddenName: true,
        min: new Date('today'),
        onClose: function(endDate) {
            var ariveDate = this.get('select', 'dd/mm/yyyy');
            //console.log('Arive on ' + ariveDate);
            //$j('#start_date').val(ariveDate);
            picker_end_date.set('select', this.get('select').obj);
        }
    })

});

/*=====  End of Datepicker  ======*/


/*===================================
=            Google Maps            =
===================================*/

(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   $el (jQuery element)
*  @return  n/a
*/

function new_map( $el ) {
    
    // var
    var $markers = $el.find('.marker');
    
    
    // vars
    var args = {
        scrollwheel : false,
        draggable   : false,
        zoom        : 16,
        center      : new google.maps.LatLng(0, 0),
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    
    
    // create map               
    var map = new google.maps.Map( $el[0], args);
    
    
    // add a markers reference
    map.markers = [];
    
    
    // add markers
    $markers.each(function(){
        
        add_marker( $(this), map );
        
    });
    
    
    // center map
    center_map( map );
    
    
    // return
    return map;
    
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   $marker (jQuery element)
*  @param   map (Google Map object)
*  @return  n/a
*/

function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
        position    : latlng,
        map         : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content     : $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

        });
    }

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type    function
*  @date    8/11/2013
*  @since   4.3.0
*
*  @param   map (Google Map object)
*  @return  n/a
*/

function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type    function
*  @date    8/11/2013
*  @since   5.0.0
*
*  @param   n/a
*  @return  n/a
*/
// global var
var map = null;

$(document).ready(function(){

    $('.estilo-map').each(function(){

        // create map
        map = new_map( $(this) );

    });

});

})(jQuery);


/*=====  End of Google Maps  ======*/
