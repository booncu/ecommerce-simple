(function($) {
    $(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        
    });
	
	$(function() {
        var jcarousel = $('.jcarousel_pu');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 450) {
                    width = width / 2;
                } else if (width >= 350) {
                    width = width / 1;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev-pu')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next-pu')
            .jcarouselControl({
                target: '+=1'
            });

      
    });
	
	$(function() {
        var jcarousel = $('.jcarousel_lk');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev-lk')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next-lk')
            .jcarouselControl({
                target: '+=1'
            });

      
    });
	
	$(function() {
        var jcarousel = $('.jcarousel_tk');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarousel-control-prev-tk')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next-tk')
            .jcarouselControl({
                target: '+=1'
            });

      
    });
	
})(jQuery);
