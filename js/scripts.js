function stickyNav() {
    var top = $(window).scrollTop();
    if (top > 100) {
        $('.header').addClass('sticky');
    } else {
        $('.header').removeClass('sticky');
    }
}

/**
 * @param {string}
 * @param {string}
 */
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

/**
 * Get cookie
 * @param  {string}
 * @return {string}
 */
function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

/**
 * Delete cookie
 * @param  {string}
 */
function removeCookie(key) {
    document.cookie = key + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

$(window).scroll(function(event){
    stickyNav();
});

$(document).ready(function() {

    $('.header .navbar-nav:not(.navbar-icons) > .dropdown').hover(function(){
        $(this).addClass('open');
    }, function(){
        $(this).removeClass('open');
    });

    if ($('.fancybox').length) {
        $('.fancybox').fancybox();
    }

    $(".owlCarousel").owlCarousel({
        items: 4,
        rtl: true,
        loop: false,
        nav: true,
        navText: ['<i class="fa fa-long-arrow-right"></i>', '<i class="fa fa-long-arrow-left"></i>'],
        margin:30,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        },
    });

    $(".customer-logo").owlCarousel({
        items: 6,
        rtl: true,
        loop: true,
        nav: false,
        margin:30,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    });

    $('.full-height').height($(window).height());
    
    $(window).resize(function(){
        $('.full-height').height($(window).height());
        $('.menu-overlay .content').css('padding-top', $(window).height()/2);
    });

    /**
     * Products Filter
     * @param  {[type]} cat
     * @param  {[type]} $content
     * @return {[type]}
     */
    function productsFilter(cat, $content) {
        $content.owlCarousel().trigger('add.owl.carousel', [$('<div/>')]);

        $content.find('.owl-item').remove();
        
        if (cat == '*') {
            $('#products-copy .product').each(function () {
                content = $('<div class="owl-item">' + $(this).clone()[0].outerHTML + '</div>');
                $content.owlCarousel().trigger('add.owl.carousel', [content]).trigger('refresh.owl.carousel');
            });
        } else {
            $('#products-copy .product' + cat).each(function () {
                content = $('<div class="owl-item">' + $(this).clone()[0].outerHTML + '</div>');
                $content.owlCarousel().trigger('add.owl.carousel', [content]).trigger('refresh.owl.carousel');
            });
        }

        owlCarWidth($content);
        $content.owlCarousel().trigger('refresh.owl.carousel');
    }

    $('.products .product').clone().appendTo($('#products-copy'));

    $('.products-filter [data-filter]').click(function(e) {
        e.preventDefault();

        $this   = $(this);
        filter  = $this.data('filter');
        $content = $($this.parents('.products-filter').attr('filter'));

        $('.products-filter').find('li.active').removeClass('active');
        $this.parents('li').addClass('active');

        productsFilter(filter, $content);
    });

    function owlCarWidth(carousel) {
        totalWidth = 0;
        carousel.find('.owl-item').each(function() {
            margin = parseInt($(this).css('margin-left'));
            totalWidth += $(this).width() + margin;
        });

        carousel.find('.owl-stage').width(totalWidth+1);
    }

    var $menuTrigger = $('[data-ic-class="button-trigger"]'),
        $menuOverlay = $('[data-ic-class="overlay"]'),
        activeClass = 'active';

    $menuTrigger.click(function() {
        $menuTrigger.toggleClass(activeClass);
        $menuOverlay.fadeToggle(200).toggleClass(activeClass);
        $('body').toggleClass('overlay-open');
        $('.menu-overlay .content').css('padding-top', $(window).height()/2);
    });

    if ($('.masonry').length) {
        $('.masonry').isotope({
            itemSelector: '.product',
            isOriginLeft: false,
            layoutMode: 'fitRows',
        });
    }

    $('.remove-product').click(function() {
        $product = $(this).parents('.media');
        product_id = $product.attr('product-id');
        productPrice = parseInt($product.find('.price > span').text().replace('$', ''));
        total = parseInt($('.cart-total i').text().replace('$', ''));

        // change total
        total = total - productPrice;
        $('.cart-total i').text('$'+ total);

        // change badge
        badge = parseInt($product.parents('.checkout').find('.badge').text());
        $('.checkout .badge').text(badge-1);

        // remove form carts
        $('.checkout .dropdown-menu').find('> li:eq('+ $product.parent().index() +')').remove();

    });

    $('.fade-toggle').click(function(e){
        $target = $($(this).data('target'));
        if ($target.css('display') == 'none') {
            $target.fadeIn(200);
        } else {
            $target.fadeOut(200);
        }
    });

    $('.payment-methods input[name="payment_method"]').change(function() {
        attr_id = $(this).attr('id');

        $target = $(this).parents('li').find('.payment_box');
        $('.payment_box').fadeOut(0);
        $target.fadeIn();
    });

    $('.products-table .product-remove').click(function(e){
        e.preventDefault();
        $target = $(this).parents('tr');
        $target.hide(400, function(){
            $target.remove();

            if ($('.products-table > tbody > tr').length == 1)
                $('.products-table > tbody > .empty-products').fadeIn(100);
        });
    });

    $('.checkout .dropdown-menu').click(function() {
        return false;
        $('.checkout').addClass('open');
    });

    $("#countdown").countdown("5/5/2018 05:00:00 UTC", function(event) {
    	text  = '<span>%D <i>يوم</i></span>';
		text += '<span>%H <i>ساعة</i></span>';
		text += '<span>%M <i>دقيقة</i></span>';
		text += '<span>%S <i>ثانية</i></span>';
		$(this).html(
			event.strftime(text)
		);
    });

    stickyNav();

    if (! getCookie('newsletter'))
        $('#newsletter-modal').modal('show');

    $('#newsletter-form button').click(function () {
        if ($('#newsletter-form #hide-newsletter:checked').length)
            setCookie('newsletter', true);
    });

    if($('#flat-slider').length) {
        $('#flat-slider').slider({
            min: 10,
            max: 2000,
            orientation: 'horizontal',
            range:       true,
            values:      [0,1000],
            slide: function (event, ui) {
                $("#amount-slider > span").html("$" + ui.values[0] + " - $" + ui.values[1]);
                $("input#price").val(ui.values[0] + "," + ui.values[1]);
            }
        });
    }

});

$('.product-qty .fa').on('click', function() {
  var qty = $(this).parent().find('input');
  var qtyVal = qty.val();
  if($(this).hasClass('fa-plus-square-o')){
    qtyVal++;
    qty.val(qtyVal);
  }
  if($(this).hasClass('fa-minus-square-o') && qtyVal > 1){
    qtyVal--;
    qty.val(qtyVal);
  }
});