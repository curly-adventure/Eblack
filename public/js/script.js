// some scripts

// jquery ready start
$(document).ready(function() {
	// jQuery code



    
    /* ///////////////////////////////////////

    THESE FOLLOWING SCRIPTS ONLY FOR BASIC USAGE, 
    For sliders, interactions and other

    */ ///////////////////////////////////////
    

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });

    ///////////////// fixed menu on scroll for desctop
    if ($(window).width() > 768) {
        
        $(window).scroll(function(){  
            if ($(this).scrollTop() > 125) {
                 $('.navbar-landing').addClass("fixed-top");
            }else{
                $('.navbar-landing').removeClass("fixed-top");
            }   
        });
    }
	//////////////////////// Fancybox. /plugins/fancybox/
	if($("[data-fancybox]").length>0) {  // check if element exists
		$("[data-fancybox]").fancybox();
	}
	
	//////////////////////// Bootstrap tooltip
	if($('[data-toggle="tooltip"]').length>0) {  // check if element exists
		$('[data-toggle="tooltip"]').tooltip()
	}

    /////////////////////// Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a.page-scroll').click(function() {
        $('.navbar-toggler:visible').click();
    });

    //////////////////////// Menu scroll to section for landing
    $('a.page-scroll').click(function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({ scrollTop: $($anchor.attr('href')).offset().top - 50  }, 1000);
        event.preventDefault();
    });

    /////////////////  items slider. /plugins/slickslider/
    if ($('.slick-slider').length > 0) { // check if element exists
        $('.slick-slider').slick();
    }

	/////////////////  items carousel. /plugins/owlcarousel/
    if ($('.owl-init').length > 0) { // check if element exists

       $(".owl-init").each(function(){
            
            var myOwl = $(this);
            var data_items = myOwl.data('items');
            var data_nav = myOwl.data('nav');
            var data_dots = myOwl.data('dots');
            var data_margin = myOwl.data('margin');
            var data_custom_nav = myOwl.data('custom-nav');
            var id_owl = myOwl.attr('id');

            myOwl.owlCarousel({
                loop: true,
                margin: data_margin,
                nav: eval(data_nav),
                dots: eval(data_dots),
                autoplay: false,
                items: data_items,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                 //items: 4,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: data_items
                    },
                    1000: {
                        items: data_items
                    }
                }
            });

            // for custom navigation. See example page: example-sliders.html
            $('.'+data_custom_nav+'.owl-custom-next').click(function(){
                $('#'+id_owl).trigger('next.owl.carousel');
            });

            $('.'+data_custom_nav+'.owl-custom-prev').click(function(){
                $('#'+id_owl).trigger('prev.owl.carousel');
            });
           
        }); // each end.//
    }
	
		/////////////////  items slider. /plugins/owlslider/
		if ($('.slider-items-owl').length > 0) { // check if element exists
			$('.slider-items-owl').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
				responsive:{
					0:{
						items:1
					},
					640:{
						items:3
					},
					1024:{
						items:4
					}
				}
			})
		} // end if
     
        const threshold = .1
const options = {
  root: null,
  rootMargin: '0px',
  threshold
}

const handleIntersect = function (entries, observer) {
  entries.forEach(function (entry) {
    if (entry.intersectionRatio > threshold) {
      entry.target.classList.remove('reveal')
      observer.unobserve(entry.target)
    }
  })
}

document.documentElement.classList.add('reveal-loaded')

window.addEventListener("DOMContentLoaded", function () {
  const observer = new IntersectionObserver(handleIntersect, options)
  const targets = document.querySelectorAll('.reveal')
  targets.forEach(function (target) {
    observer.observe(target)
  })
})

}); 
// jquery end

