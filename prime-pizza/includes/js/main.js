$(document).ready(function() {
    $('#section-about').waypoint(function(direction){
        if (direction === 'down') {
            $('.primary-nav-bar-container').addClass('sticky-nav');
        } else {
            $('.primary-nav-bar-container').removeClass('sticky-nav');
        }
    }, {offset: '40%'});
    
    /* MOBILE NAVIGATION */
    $('.mobile-nav-icon').click(function() {
        var nav = $('.main-nav');
        var icon = $('.mobile-nav-icon i');
        
        nav.slideToggle(200);
        if (icon.hasClass('fa-bars')) {
            icon.removeClass('fa-bars');
            icon.addClass('fa-times');
        } else {
            icon.removeClass('fa-times');
            icon.addClass('fa-bars');
        }
    });
    
});