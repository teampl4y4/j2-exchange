(function(namespace, $, undefined) {

    namespace.OffersPieGraph = Backbone.View.extend({

        events: {

        }

        , initialize: function(){
            this.model.on('change:gData', this.render, this);
            this.render();
        }

        , render: function(){

            var data = this.model.get('gData');

            if(data && data.length > 0) {
                $.plot(this.el, data,
                {
                    series: {
                        pie: {
                            show: true,
                            innerRadius: 0.5,
                            radius: 1
                        }
                    },

                    legend: {
                        show: true,
                        noColumns: 1, // number of colums in legend table
                        labelFormatter: null, // fn: string -> string
                        labelBoxBorderColor: "#000", // border color for the little label boxes
                        container: null, // container (as jQuery object) to put legend in, null means default on top of graph
                        position: "ne", // position of default legend container within plot
                        margin: [5, 10], // distance from grid edge to default legend container within plot
                        backgroundColor: "#efefef", // null means auto-detect
                        backgroundOpacity: 1 // set to 0 to avoid background
                    },

                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                });
            }

        }
    })

})(window.J2 = window.J2 || {}, jQuery);