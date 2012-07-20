(function(namespace, $, undefined) {

    namespace.RevenueGraph = Backbone.View.extend({

        events: {

        }

        , initialize: function(){
            this.model.on('change:gData', this.render, this);
            this.render();
        }

        , render: function(){

            var data = this.model.get('gData');

            if(data) {

                console.info(data);

                var sin = [], cos = [];
                for (var i = 0; i < 3; i += 0.5) {
                    sin.push([i, Math.sin(i)]);
                    cos.push([i, Math.cos(i)]);
                }

                var tData = [ { data: sin, label: "revenue"}, { data: cos, label: "orders" } ];

                console.info(tData);

                var plot = $.plot($(".chart"),
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