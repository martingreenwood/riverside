var $j=jQuery;$j(function(){function e(){$j(".slide").eq(t%i).fadeTo(900,1).siblings(".slide").fadeTo(900,0)}function n(){o||(clearTimeout(a),a=setTimeout(function(){t++,e(),n()},7e3))}$j(".slide:gt(0)").hide();var t=0,a,o=!1,i=$j(".slide").length;n()}),$j(function(){$j(".slick").slick({infinite:!0,dots:!1})}),$j(function(){$j("#start_date").pickadate({format:"dd/mm/yyyy"}),$j("#departure_date").pickadate({format:"dd/mm/yyyy"})}),function($){function e(e){var a=e.find(".marker"),o={zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},i=new google.maps.Map(e[0],o);return i.markers=[],a.each(function(){n($(this),i)}),t(i),i}function n(e,n){var t=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),a=new google.maps.Marker({position:t,map:n});if(n.markers.push(a),e.html()){var o=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(a,"click",function(){o.open(n,a)})}}function t(e){var n=new google.maps.LatLngBounds;$.each(e.markers,function(e,t){var a=new google.maps.LatLng(t.position.lat(),t.position.lng());n.extend(a)}),1==e.markers.length?(e.setCenter(n.getCenter()),e.setZoom(16)):e.fitBounds(n)}var a=null;$(document).ready(function(){$(".estilo-map").each(function(){a=e($(this))})})}(jQuery);