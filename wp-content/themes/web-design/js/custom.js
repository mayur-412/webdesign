// Show the first tab and hide the rest
jQuery('.tab ul li:first-child').addClass('active');
jQuery('.tab-content').hide();
jQuery('.tab-content:first').show();

// Click function
jQuery('.tab ul li').click(function(){
  jQuery('.tab ul li').removeClass('active');
  jQuery(this).addClass('active');
  jQuery('.tab-content').hide();
  
  var activeTab = jQuery(this).find('a').attr('href');
  jQuery(activeTab).fadeIn();
  return false;
});


// Show the first tab and hide the rest
jQuery('.tab-box ul li:first-child').addClass('active');
jQuery('.protfolio').hide();
jQuery('.protfolio:first').show();

// Click function
jQuery('.tab-box ul li').click(function(){
  jQuery('.tab-box ul li').removeClass('active');
  jQuery(this).addClass('active');
  jQuery('.protfolio').hide();
  
  var activeTab = jQuery(this).find('a').attr('href');
  jQuery(activeTab).fadeIn();
  return false;
});


var a = 0;

if (jQuery("#counter-box").length) {

    jQuery(window).on("scroll", function () {

        var oTop = jQuery("#counter-box").offset().top - window.innerHeight;

        if (a == 0 && jQuery(window).scrollTop() > oTop) {

            jQuery(".counter").each(function () {

                var jQuerythis = jQuery(this),
                    countTo = jQuerythis.attr("data-number");

                jQuery({ countNum: jQuerythis.text() }).animate({

                    countNum: countTo

                }, {

                    duration: 1500,
                    easing: "swing",

                    step: function () {

                        jQuerythis.text(
                            Math.ceil(this.countNum).toLocaleString("en")
                        );

                    },

                    complete: function () {

                        jQuerythis.text(
                            Math.ceil(this.countNum).toLocaleString("en")
                        );

                    }

                });

            });

            a = 1;

        }

    });

}


jQuery(document).ready(function () {

    var sync1 = jQuery("#big");
    var sync2 = jQuery("#thumbs");

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsiveRefreshRate: 200,
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function () {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: 5,
            dots: false,
            nav: false,
            margin: 10,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 1,
            responsiveRefreshRate: 100,
            responsive: {
                0: {
                    items: 2
                },
               321: {
                    items: 3
                },
                640: {
                    items: 5
                }
            }
        }).on('changed.owl.carousel', syncPosition2);


    function syncPosition(el) {

        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }

        if (current > count) {
            current = 0;
        }

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");

        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }

        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }


    function syncPosition2(el) {

        var number = el.item.index;

        sync1.trigger('to.owl.carousel', [number, 300, true]);

    }

    jQuery('#thumbs').on('click', '.owl-item', function (e) {

        e.preventDefault();

        var number = jQuery(this).index();

        sync1.trigger('to.owl.carousel', [number, 300, true]);

    });

});

document.addEventListener(
                "DOMContentLoaded", () => {
                    new Mmenu( "#menu", {
                       "offCanvas": {
                          "position": "left"
                       },
                       "theme": "light"
                    });
                }
            );


//  about- section jquery

jQuery(document).ready(function () {

    var achievementStarted = false;

    if (jQuery(".achievement-section").length) {

        var achievementTop = jQuery(".achievement-section").offset().top - window.innerHeight + 100;

        jQuery(window).on("scroll", function () {

            if (!achievementStarted && jQuery(window).scrollTop() > achievementTop) {

                jQuery(".achievement-number").each(function () {

                    var jQuerythis = jQuery(this);
                    var countTo = parseInt(jQuerythis.attr("data-number"));

                    jQuery({
                        countNum: 0
                    }).animate({

                        countNum: countTo

                    }, {

                        duration: 1800,
                        easing: "swing",

                        step: function () {

                            jQuerythis.text(Math.ceil(this.countNum));

                        },

                        complete: function () {

                            jQuerythis.text(countTo);

                        }

                    });

                });

                achievementStarted = true;

            }

        });

    }

});

jQuery('.testimonial-slider').owlCarousel({
    loop:true,
    margin:30,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:4000,
    smartSpeed:700,

    responsive:{
        0:{
            items:1
        },
        481:{
            items:2
        },
        768:{
            items:3
        }
    }
});

//  about page jquery end


//  service page jquery start


jQuery(".faq-question").click(function(){

    var item = jQuery(this).parent();

    if(item.hasClass("active")){

        item.removeClass("active");

        item.find(".faq-answer").slideUp();

    }else{

        jQuery(".faq-item").removeClass("active");

        jQuery(".faq-answer").slideUp();

        item.addClass("active");

        item.find(".faq-answer").slideDown();

    }

});





//  service page jquery end



//  protfolio pag jquery start




