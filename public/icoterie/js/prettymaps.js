// +----------------------------------------------------------------------------------------
// | Icoterie Smart System Intelligence Enterprise  Management System Priority Selective
// +----------------------------------------------------------------------------------------
// | Copyright (c) [2019] [Honor Full Epoch Educational Science Technology Hebei Co., Ltd.]
// | website  http://www.icoterie.top http://www.ihfe.top
// +----------------------------------------------------------------------------------------
// | [Icoterie Smart System] is licensed under the Mulan PSL v1.
// +----------------------------------------------------------------------------------------
// | You can use this software according to the terms and conditions of the Mulan PSL v1.
// +----------------------------------------------------------------------------------------
// | Licensed ( http://license.coscl.org.cn/MulanPSL )
// +----------------------------------------------------------------------------------------
// | THIS SOFTWARE IS PROVIDED ON AN "AS IS" BASIS, WITHOUT WARRANTIES OF ANY KIND, EITHER
// | EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO NON-INFRINGEMENT, MERCHANTABILITY OR
// | FIT FOR A PARTICULAR PURPOSE.
// +----------------------------------------------------------------------------------------
// | See the Mulan PSL v1 for more details.
// +----------------------------------------------------------------------------------------
// | Author: Reflux Lewse,Red Shadow Sue
// +----------------------------------------------------------------------------------------
// | version  0.0.1
// +----------------------------------------------------------------------------------------
// | datetime 2016-12-01T21:51:08+0800
// +----------------------------------------------------------------------------------------

/*
* prettyMaps 1.0.0
*
* Copyright 2014, Jean-Marc Goefpert - http://omgogepfert.com
* Released under the WTFPL license - http://www.wtfpl.net/
*
* Date: Sun Jan 12 18:00:00 2014 -0500
*/

(function($) {

    function prettyMaps(el, options) {

        options = options || {};

        this.defaults = {
            address: 'Melbourne, Australia',
            zoom: 13,
            panControl: false,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            scrollwheel: true,
            image: '',
            styles: [
                {
                    stylers: [
                        { hue: options.hue },
                        { saturation: options.saturation },
                        { lightness: options.lightness }
                    ]
                }
            ]
        };

        this.options = $.extend({}, this.defaults, options);
        this.$el = $(el);
    }

    prettyMaps.prototype = {

        init: function() {
            var that = this,
                geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                'address': this.options.address
            }, function(results, status) {
                if ( status === google.maps.GeocoderStatus.OK ) {
                    var map = that.drawMap(results),
                        marker = that.placeMarker(map, results);
                }
            });
        },

        drawMap: function(results) {
            var mapDetails = { center: results[0].geometry.location },
                finalOptions = $.extend({}, this.options, mapDetails),
                map = new google.maps.Map(this.$el[0], finalOptions);

            return map;
        },

        placeMarker: function(map, results) {
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                icon: this.options.image,
                animation: google.maps.Animation.DROP
            });
        }
    };

    $.fn.prettyMaps = function(options) {
        if ( this.length ) {
            this.each(function() {
                var rev = new prettyMaps(this, options);
                rev.init();
                $(this).data('prettyMaps', rev);
            });
        }
    };
})(jQuery);