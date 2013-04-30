/**
 * Set up the basic map and
 * Create the original location on Google Map
 */
$(function() {
    var yourStartLatLng = new google.maps.LatLng(40.10933, -88.22708);
    $('#map_canvas').gmap({'center': yourStartLatLng, 'zoom': 15});
});

/**
 * Set up current location button
 * Create new current location marker basic on geolocation
 */
$(function() {
    $('#currentLocation').click(function(){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position)
            {
                var clientPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                $('#map_canvas').gmap('addMarker', {'position': clientPosition,
                    'bounds': false, 'title': "My Current Location", 'icon': "image/pin_location_orange.png", 'animation': google.maps.Animation.DROP});
                $('#map_canvas').gmap('addShape', 'Circle', {
                    'strokeWeight': 0.1,
                    'fillColor': "#008595",
                    'fillOpacity': 0.25,
                    'center': clientPosition,
                    'radius': 15,
                    'clickable': false
                });
                $('#map_canvas').gmap('getMap').panTo(clientPosition);
            });
        }
    })
});

/**
 * Parse data from json file
 * Set up marker and info windows for each restaurant
 */
$(function() {
    $.getJSON("data.json", function(data) {
        var schoolShadow = {
            url:'image/schools_maps.shadow.png',
            anchor: new google.maps.Point(16, 34)
        };
        $.each(data.markers, function(i, m) {
            $('#map_canvas').gmap('addMarker', {'position': new google.maps.LatLng(m.latitude, m.longitude), 'bounds':false, 'icon': "image/schools_maps.png",'shadow': schoolShadow,'title': m.name, 'animation': google.maps.Animation.DROP}).click(function() {
                $('#map_canvas').gmap('openInfoWindow',
                    {'content': "<div class='span4' style='overflow:visible'><div class='row'><div class='span2'><h4>"+m.name+"</h4>" + "<strong>Location: </strong>"+ m.location +"<br>" + "<strong>Phone: </strong>"+ m.phone+"<br>" + "<strong>Open Hour: </strong>"+ m.openHour + "<br></div>" + "<div class='span2'><br><br><img style='width:140px;height:100px' class='img-polaroid' src='" + m.image + "'></div></div></div>"
                    }, this);
                $.ajax({
                    type: "POST",
                    url: "getMenus.php",
                    data: {restaurant: m.name}
                    ,success: function(html){
                        $("#list").hide();
                        $("#list").html(html).fadeIn(2000);
                    }
                });
            });
        });
    });
});

/**
 * Set the parent id for each reply
 */
$(function(){
    $("#list").on("click", "a.reply", function () {
        var id = $(this).attr("id");
        $(this).parents('div').first().parent().find('#parent_id').attr("value", id);
    });
});

/**
 * Fetch comment for each dish
 * Set up comment posting system for each dish
 */
$(function(){
    $("#list").on("click", ".accordion-group", function () {
        var x = $(this);
        $.ajax({
            type: "POST",
            url: "fetch_comment.php",
            data: {
                restaurant: x.find('#restaurant').val(), dish_name: x.find('#dish_name').val()
            }
            , success: function(html){
                xx.parent().find('#comment').html(html);
            }
        });
        var xx = $(this).find('#add_button');
        $(this).find('#add_button').unbind();
        $(this).find('#add_button').click(function() {
            $.ajax({
                type: "POST",
                url: "post_comment.php",
                data: {writer_name: xx.parent().find('#poster_name').val(),comment_body: xx.parent().find('#comment_body').val(),restaurant: xx.parent().find('#restaurant').val(),dish_name: xx.parent().find('#dish_name').val(),parent_id: xx.parent().find('#parent_id').val()
                }
                , success: function(html){
                    xx.parent().find('#comment').html(html);
                }
            });
            $(this).parent().find('#parent_id').attr('value', 0);
        });
    });
});

/**
 * Set up the auto-complete
 * Bind select with commenting system.
 */
$(function() {
    function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#log" ).scrollTop( 0 );
    }
    $( "#search-query" ).autocomplete({
        source: function(request, response){
            $.ajax({
                url: "dump.php",
                type: "POST",
                data: {
                    name_startsWith: request.term
                },
                success:function(data){
                    var json = JSON.stringify(eval("(" + data + ")"));
                    var obj = JSON.parse(json);
                    response($.map(obj, function(item){
                        return {
                            label: item.dish_name,
                            value: item.dish_name,
                            desc: item.restaurant + ", " + item.dish_price
                        }
                    }))
                }
            })
        },
        select: function(event, ui){
            var valueArray = ui.item.desc.split(', ');
            var dishName = ui.item.label;
            var dishRestaurant = valueArray[0];
            $.ajax({
                type: "POST",
                url: "fetch_comment.php",
                data: {
                    restaurant: dishRestaurant, dish_name:dishName
                }
                , success: function(html){

                    $("#dialog").html(html);
                    $(".ui-dialog-title").html(dishName);
                }
            });
            $("#dialog").dialog("open");
        }
    })
        .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var t = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong style='color:#3399FF'>$1</strong>");
        return $( "<li>" )
            .append( "<a>" + t + "<br>" + "<p class='muted'>" + item.desc + "</p></a>" )
            .appendTo( ul );
        };
});

/**
 * Controller of the dialog
 */
$(function() {
    $( "#dialog" ).dialog({
        autoOpen: false
    });

    $( "#opener" ).click(function() {
        $( "#dialog" ).dialog( "open" );
    });
});



