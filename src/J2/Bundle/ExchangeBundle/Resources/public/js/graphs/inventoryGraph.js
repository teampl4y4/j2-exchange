(function(namespace, $, undefined) {

    namespace.InventoryGraph = Backbone.View.extend({

        events: {

        }

        , initialize: function(){
            this.model.on('change:gData', this.render, this);
        }

        , render: function(){

            var data = this.model.get('gData');

            if(data && data.length > 0) {
                var stack = 0, bars = true, lines = false, steps = false;

                $.plot(this.el, data, {
                    series: {
                        stack: stack,
                        lines: { show: lines, fill: true, steps: steps },
                        bars: { show: bars, barWidth: 0.6 }
                    }
                    , xaxis: { show: false }
                });
            }

        }
    })

})(window.J2 = window.J2 || {}, jQuery);