var $j=jQuery;$j(function($){var e="<div class='modal-overlay js-modal-close'></div>";$("a[data-modal-id]").click(function(a){a.preventDefault(),$("body").append(e),$(".modal-overlay").fadeTo(500,.7);var o=$(this).attr("data-modal-id");$("#"+o).fadeIn($(this).data())}),$(".js-modal-close, .modal-overlay").click(function(){$(".modal-box, .modal-overlay").fadeOut(500,function(){$(".modal-overlay").remove()})}),$(window).resize(function(){$(".modal-box").css({top:($(window).height()-$(".modal-box").outerHeight())/2,left:($(window).width()-$(".modal-box").outerWidth())/2})}),$(window).resize()}),$j(function(){$j(".block .column").matchHeight()}),$j(function(){$j(".slick").slick({infinite:!0,dots:!1,infinite:!0,fade:!0,speed:800})}),$j(function(){var e=$j("#departure_date").pickadate({today:"",clear:"",close:"",formatSubmit:"dd/mm/yyyy",hiddenName:!0,min:new Date("today")}),a=e.pickadate("picker"),o=$j("#start_date").pickadate({today:"",clear:"",close:"",formatSubmit:"dd/mm/yyyy",hiddenName:!0,min:new Date("today"),onClose:function(e){var o=this.get("select","dd/mm/yyyy");a.set("select",this.get("select").obj)}})}),function($){function e(e){var t=e.find(".marker"),n={scrollwheel:!1,draggable:!1,zoom:16,center:new google.maps.LatLng(0,0),mapTypeId:google.maps.MapTypeId.ROADMAP},i=new google.maps.Map(e[0],n);return i.markers=[],t.each(function(){a($(this),i)}),o(i),i}function a(e,a){var o=new google.maps.LatLng(e.attr("data-lat"),e.attr("data-lng")),t=new google.maps.Marker({position:o,map:a});if(a.markers.push(t),e.html()){var n=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(t,"click",function(){n.open(a,t)})}}function o(e){var a=new google.maps.LatLngBounds;$.each(e.markers,function(e,o){var t=new google.maps.LatLng(o.position.lat(),o.position.lng());a.extend(t)}),1==e.markers.length?(e.setCenter(a.getCenter()),e.setZoom(16)):e.fitBounds(a)}var t=null;$(document).ready(function(){$(".estilo-map").each(function(){t=e($(this))})})}(jQuery);