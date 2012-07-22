(function(namespace, $, undefined) {

    namespace.RevenueGraph = Backbone.View.extend({

        events: {

        }

        , initialize: function(){
            this.model.on('change:gData', this.render, this);
        }

        , render: function(){

            var data = this.model.get('gData');

            if(data && data.length > 0) {
                var plot = $.plot(this.el,
                    data, {
                        series: {
                            lines: { show: true },
                            points: { show: true }
                        },
                        grid: { hoverable: true, clickable: true }
                    }
                );
            }

        }
    })

})(window.J2 = window.J2 || {}, jQuery);