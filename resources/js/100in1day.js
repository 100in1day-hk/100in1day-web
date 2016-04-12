
$(document).ready(function(){
    var project_fetch = $.ajax({
        "url": SERVER_URL + "/api/projects"
    }).done(function(data){
        var content = "";
        $.each(data, function(k,val){
            content += '<div class="item">';
            content += '    <div class="project">';
            content += '            <div class="image">';
            content += '                    <img src="'+val['photos']+'">';
            content += '            </div>';
            content += '            <h4>'+ val['projectName']+ '<br /><small>by '+val['projectHolder']+'</small></h4>';
            content += '                <p>'+val['projectDescription']+'</p>';
            content += '                <p></p>';
            content += '        </div>';
            content += '</div>';
        });
        $("#project_list").html(content);
    });

    var workshop_fetch = $.ajax({
        "url": SERVER_URL + "/api/workshops"
    }).done(function(data){
        var content = '';
        $.each(data, function(k,val){

            content += '<div class="col-xs-12 col-md-4">';
            content += '        <div class="person">';
            content += '                <div class="image">';
            content += '                        <img src="'+val['photos']+'">';
            content += '                </div>';
            content += '                <h4>' + val['workshopName'] +'</h4>';
            content += '                <p>' + val['workshopDescription'] + '</p>';
            content += '                <p>' + val['workshopDate'] + '</p>';
            content += '        </div>';
            content += '</div>';
        });
        $("#workshop_list").html(content);
        $("#workshop_list").append('<div class="clearfix"></div>');
    });


    var committee_fetch = $.ajax({
        "url" : SERVER_URL + "/api/committees"
    }).done(function(data){
        var content = '';
        $.each(data, function(k, val){
            content += '<div class="col-xs-4 col-sm-4 col-md-4">';
            content += '        <div class="person">';
            content += '                <div class="image">';
            content += '                    <img src="' + val['committeeImage'] + '" />';
            content += '                </div>';
            content += '                <p>' + val['committeeName'] + '</p>';
            content += '        </div>';
            content += '</div>';

        });
        $("#committee_list").html(content);
        $("#committee_list").append('<div class="clearfix"></div>');
    });

    var medium_fetch = $.ajax({
        "url" : SERVER_URL + "/api/media"
    }).done(function(data){
        var content = "";
        var i = 0;

        $.each(data, function(k, val){
            i = i + 1;
            if ( i % 3 == 0){
                content += '<div class="row">';
            }
            content += '<div class="col-xs-12 col-sm-4 col-md-4">';
            content += '        <div class="media-item">';
            content += '                <img src="'+ ASSET_URL + '/img/media-stand.png" />';
            content += '                <a href="' + val['mediaUrl'] + '" target="_blank">';
            content += '                    '+val['mediaTitle'];
            content += '                </a>';
            content += '        </div>';
            content += '</div>';

            if ( i % 3 == 0){
                content += '</div>';
            }
        });
        $("#medium_list").html(content);
        $("#medium_list").append('<div class="clearfix"></div>');
    });


    var support_fetch = $.ajax({
        "url" : SERVER_URL + "/api/supports"
    }).done(function(data){
        var content = "";
        $.each(data, function(k, val){
            content += '<a href="' + val['supportURL'] + '"><img class="support-logo" title="' + val['supportName'] +'" src="' + UPLOAD_URL + '/support/' + val['supportLogo'] + '"></a>';
        });
        $("#support_list").html(content);
        $("#support_list").append('<div class="clearfix"></div>');
    });

    $.when(
            project_fetch,
            workshop_fetch,
            medium_fetch,
            committee_fetch
          ).done(function () {
        var options = {  
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: ''
        };
        var demo = new CountUp("ideaCount", 0, 133, 0, 2.5, options);
        var demo2 = new CountUp("ideaCount2", 0, 33, 0, 2.5, options);
        setTimeout(function () {
            demo.start();
            demo2.start();
        }, 400);
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            },
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        })
    });
    $('.loading-screen').fadeOut(500, function() {
        $('.main').height('auto');
    });
});
    
