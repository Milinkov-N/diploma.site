$(document).ready(function(){
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTime: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            780: {
                items: 2,
                nav: false
            },
            1100: {
                items: 3,
                nav: false
            }
        }
    });
});

