$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    var hash = $.attr(this, 'href');
    
    $('html, body').animate({
        scrollTop: $(hash).offset().top + -100
    }, 0);

    
    if(localStorage.getItem("target", hash))
        $(localStorage.getItem("target", hash)).removeClass('target');

    $(hash).addClass('target');
    
    setTimeout(function(){
        $(hash).removeClass('target');
    },1000)
    
    localStorage.setItem("target", hash);

});

var count = $('#count').text();

function updateCount() {
    $('#count').animate({
        counter: count
    }, {
        duration: 2000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        },
        complete: updateCount
    });
};

updateCount();
