import calculator from './calculator/index.js';

jQuery(document).ready(function($) {
    
    // Карусель
    jQuery('#frontpageSlider').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        margin: 0,
        stagePadding: 0,
        nav: true,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.004 492.004" width="512" height="512"><path d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" fill="#FFF"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492.004 492.004" width="512" height="512"><path d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" fill="#FFF"/></svg>'
        ],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 500,
        autoplayHoverPause: false,
        lazyContent: true,
        navContainer: '.slides-controls__nav',
        dotsContainer: '.slides-controls__dots',
    });

    var body = document.getElementsByTagName('body')[0];
    var bodyScrollTop = null;
    var locked = false;

    // Заблокировать прокрутку страницы
    function lockScroll() {
        if (!locked) {
            bodyScrollTop = (typeof window.pageYOffset !== 'undefined') ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
            body.classList.add('scroll-locked');
            body.style.top = `-${bodyScrollTop}px`;
            locked = true;
        };
    }

    // Включить прокрутку страницы
    function unlockScroll() {
        if (locked) {
            body.classList.remove('scroll-locked');
            body.style.top = null;
            window.scrollTo(0, bodyScrollTop);
            locked = false;
        }
    }

    if(window.location.hash) {
        var target = $(window.location.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if(target.length) {
            event.preventDefault();
            var delta = $(window).width() < 768 ? 100 : 250;
            var top = target.offset().top - delta;
            $('html, body').animate({
              scrollTop: top
            }, 500);
        }
    }

    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
          && 
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            var delta = $(window).width() < 768 ? 100 : 250;
            var top = target.offset().top - delta;
            $('html, body').animate({
              scrollTop: top
            }, 1000);
          }
        }
      });

    // Всплывающее меню на мобильных
    $("#header__menu-button").click(function() {
        var $mobile_menu = $('#mobile-menu');
        if( $mobile_menu.hasClass('header__mobile-menu-wrapper_hidden') ) {
            if( !$('#inf-modal').hasClass('hidden') )
                $('#inf-modal').addClass('hidden');
            $mobile_menu.removeClass('header__mobile-menu-wrapper_hidden');
            lockScroll();
        } else {
            $mobile_menu.addClass('header__mobile-menu-wrapper_hidden');
            unlockScroll();
        }
    });

    // Информационные модальные окна
    var $modal = $('#inf-modal');
    var $img_c = $('#inf-modal .inf-modal__image');
    var $title_c = $('#inf-modal .inf-modal__title');
    var $subtitle_c = $('#inf-modal .inf-modal__subtitle');
    var $descr_c = $('#inf-modal .inf-modal__description');

    jQuery('.inform-modal-button').click(function(){
        var info = {
            photo: $(this).data('photo'),
            title: jQuery(this).data('title'),
            subtitle: $(this).data('subtitle'),
            descr: jQuery(this).data('descr')
        };
        
        $img_c.html(info.photo);
        $title_c.html(info.title);
        $subtitle_c.html(info.subtitle);
        $descr_c.html(info.descr);

        if(info.title == 'Сертификаты') {
            $("#inf-modal .inf-modal__image").addClass('inf-modal__image_doc');
            $("#inf-modal .inf-modal__content").addClass('inf-modal__content_doc');
        } else {
            $("#inf-modal .inf-modal__image").removeClass('inf-modal__image_doc');
            $("#inf-modal .inf-modal__content").removeClass('inf-modal__content_doc');
        }

        $modal.removeClass('hidden');
        lockScroll();
    });
    $(".inf-modal__close").click(function() {
        $modal.addClass('hidden');
        unlockScroll();
    });

    // Модальное окно обратного звонка
    jQuery('#wpcf7-f105-o1 .wpcf7-tel').mask( "+7 (999) 999-99-99" );

    var $mobile_menu = $('#mobile-menu');
    var $button = $('.wpcf7-submit');
    var $form = $('#wpcf7-f105-o1');
    //var $real_form = $();

    $form.on( 'wpcf7invalid', function( event ) {
        console.log('invalid');
        $button.removeAttr('disabled').attr('value', 'Перезвоните мне').css('opacity', '1');
    });
    $form.on( 'wpcf7mailsent', function( event ) {
        console.log('sent');
        $button.attr('disabled', 'disabled').attr('value', 'Отправлено!').css('opacity', '.5');
        setTimeout(function() {
            $('#back-call-modal').addClass('hidden');
            unlockScroll();
        }, 3000);
    });
    $form.on( 'wpcf7mailfailed', function( event ) {
        alert('При отправке произошла ошибка! Попробуйте позже!');
    });
    $form.submit(function() {
        console.log('click');
        $button.attr('disabled', 'disabled').attr('value', 'Отправляю..').css('opacity', '.5');
    });

    $('.back-call').click(function() {
        if( !$mobile_menu.hasClass('header__mobile-menu-wrapper_hidden') )
            $mobile_menu.addClass('header__mobile-menu-wrapper_hidden');

        $('#back-call-modal').removeClass('hidden');
        lockScroll();
        $('.form__input').first().focus();
    });
    $('#back-call-close').click(function() {
        $('#back-call-modal').addClass('hidden');
        unlockScroll();
    });

    // Подгрузка новостей на главной
    $("#archive-button").click(function() {
        var totalPages = $(this).data('total-pages');
        var currentPage = $(this).data('current-page');
        var nextPage = currentPage + 1;

        console.log(totalPages);
        console.log(currentPage);
        console.log(nextPage);

        var data = {
            action: 'load_news',
            page: nextPage
        };

        $("#archive-button").text('Загрузка..').attr('disabled', 'disabled');

        jQuery.post( '/wp-admin/admin-ajax.php', data, function(response) {
            var response = JSON.parse(response);
            console.log(response);
            var $html = jQuery(response.newsHtml);
            jQuery('.archive-page').append($html);

            jQuery("#archive-button").attr('data-current-page', nextPage);
            jQuery("#archive-button").data('current-page', nextPage);

            $("#archive-button").text('Ещё новости').removeAttr('disabled');

            if( $("#archive-button").data('current-page') == totalPages) {
                $("#archive-button").hide();
            }
        });
    });
});