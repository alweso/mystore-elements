(function ($, elementor) {
    "use strict";



    var MTSE = {
      init: function () {
        var widgets = {
          "ms-slider-widget.default": MTSE.Slider,
          "ms-instagram-feeds.default": MTSE.InstaFeeds,
          "ms-testimonial-slider.default": MTSE.TestimonialSlider,
          "ms-product-slider.default": MTSE.ProductSlider,
          "ms-product-tabs-grid.default": MTSE.Tabs,
          "ms-countdown.default": MTSE.Countdown
        };

        $.each(widgets, function (widget, callback) {
          elementor.hooks.addAction("frontend/element_ready/" + widget, callback);
        });
      },

      Slider: function ( $scope ) {
        var sliders = $scope.find(".ms-slider");

        if (sliders.length > 0) {
          sliders.each(function () {
            var slider = $(this);

            slider.owlCarousel({
                items: 1,
                autoplay: false,
                loop: true
            });

          });
        }
      },

      ProductSlider: function ( $scope ) {
        var productSliders = $scope.find(".ms-product-slider");
        // const controls = JSON.parse(this.elements.$secondSelector.attr('data-controls'));
        // const dot_nav_show = Boolean(controls.dot_nav_show?true:false);

        // $(".owl-carousel").each(function (index) {
        //     var items_no = $(this).data('slides');
        //     var autoplay = $(this).data('autoplay');
        //     $(this).owlCarousel({ // use $(this)
        //         items: items_no,
        //         autoplay: autoplay
        //     });
        // });


        if (productSliders.length > 0) {
          productSliders.each(function () {
            var productSlider = $(this);
            var items_no = productSlider.data('slides');
            var autoplay = productSlider.data('autoplay');
            var carouselOptions = productSlider.data('carousel-options');
            console.log(carouselOptions);
            productSlider.owlCarousel(carouselOptions);

          });
        }
      },
      InstaFeeds: function ( $scope ) {
        var instas = $scope.find(".ms-instagram-feed");

        if (instas.length > 0) {
            instas.each(function () {
            var insta = $(this);
            var insta_datas = insta.data('insta');

            var insta_args = {
                'container': insta_datas.container,
                'display_profile': JSON.parse( insta_datas.display_profile ),
                'display_biography': JSON.parse( insta_datas.display_biography ),
                'display_gallery': JSON.parse( insta_datas.display_gallery ),
                'callback': JSON.parse( insta_datas.callback ),
                'styling': JSON.parse( insta_datas.styling ),
                'items': JSON.parse( insta_datas.items ),
                'image_size': insta_datas.image_size,
            }

            if( insta_datas.hasOwnProperty('username') ) {
                insta_args.username = insta_datas.username;
            } else if( insta_datas.hasOwnProperty('tag') ) {
                insta_args.username = insta_datas.tag;
            }

            $.instagramFeed( insta_args );

          });
        }
      },
      TestimonialSlider: function ( $scope ) {
        var tsliders = $scope.find(".ms-testimonial-slider");

        if (tsliders.length > 0) {
            tsliders.each(function () {
                var tslider = $(this);
                var slider_data = tslider.data('slider');

                tslider.owlCarousel({
                    items: 1,
                    loop: JSON.parse(slider_data.loop),
                    autoplay: JSON.parse( slider_data.autoplay ),
                    autoplayHoverPause: JSON.parse(slider_data.pause_on_hover),
                    dots: JSON.parse(slider_data.show_dots)
                });
            });
        }
      },
      Tabs: function( $scope ) {
        var tabs = $scope.find(".ms-product-tabs-grid");

        if( tabs.length > 0 ) {
          tabs.each(function(index, tab) {
            $(tab).find('li').click(function(e) {
              e.preventDefault();
              let id = $(this).data('id');

              $(this).siblings().removeClass('active');
              $(this).parents('.ms-product-tabs-grid').find('.products').removeClass('active');

              $(this).addClass('active');
              $(this).parents('.ms-product-tabs-grid').find('#' + id).addClass('active');
            });
          });
        }
      },
      Countdown: function ( $scope ) {
        var countdowns = $scope.find(".ms-countdown");

        if (countdowns.length > 0) {
          countdowns.each(function () {
            var ctDown = $(this),
                countdown_data = ctDown.data('countdown'),
                cDate = new Date(countdown_data.date);

            ctDown.countdown(cDate).on('update.countdown', function(event) {
              var format = '%H:%M:%S';

              var html = '<ul>';
              /** Years */
              if(event.offset.years > 0) {
                html += '<li><span class="label">Years</span><span class="value">%-Y</span></li>';
              }

              /** Months */
              if(event.offset.months > 0) {
                html += '<li><span class="label">Months</span><span class="value">%-m</span></li>';
              }

              /** Weeks */
              if(event.offset.weeks > 0) {
                html += '<li><span class="label">Weeks</span><span class="value">%-w</span></li>';
              }

              /** Days */
              if(event.offset.days > 0) {
                html += '<li><span class="label">Days</span><span class="value">%-n</span></li>';
              }

              /** Hours */
              if(event.offset.hours > 0) {
                html += '<li><span class="label">Hours</span><span class="value">%-H</span></li>';
              }

              /** Minutes */
              if(event.offset.minutes > 0) {
                html += '<li><span class="label">Minutes</span><span class="value">%-M</span></li>';
              }

              /** Seconds */
              if(event.offset.seconds > 0) {
                html += '<li><span class="label">Seconds</span><span class="value">%-S</span></li>';
              }

              html += '</ul>';

              $(this).html(event.strftime(html));
            });
          });
        }
      }
    };
    $(window).on("elementor/frontend/init", MTSE.init);
  })(jQuery, window.elementorFrontend);
