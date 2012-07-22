(function(namespace, $, undefined) {

    namespace.OfferTableRow = Backbone.View.extend({

          tagName: 'tr'
        , className: 'offer-row'
        , events: {
            "click" : "showOff"
        }

        , render: function(){
            this.$el.empty().append(
                '<td align="center">' + this.model.get('quantity') + '</td>' +
                '<td>' + this.model.get('name') + '</td>' +
                '<td align="center">$' + this.model.get('listPrice') + '</td>' +
                '<td align="center">$' + this.model.get('whisperPrice') + '</td>' +
                '<td align="center">' + this.model.get('matches') + '</td>' +
                '<td align="center">' + this.model.get('active') + '</td>'
            )

            return this.$el;
        }

        , showOff: function() {
            alert("I am showing off " + this.model.get('name'));
        }
    });

    namespace.OffersTable = Backbone.View.extend({
        tagName: 'tbody'
        , className: 'offers-table'

        , initialize: function() {
            this.collection.on('remove', this.render, this);
            this.collection.on('add', this.render, this);
        }

        , render: function() {
            var $el = $(this.el);
            $el.empty();
            this.collection.each( function(model) {
                $el.append( new namespace.OfferTableRow({ model: model}).render() )
            });
            if ( !this.collection.size() ) {
                $el.append($('<tr><td colspan="100%" style="text-align: left;"><em>You have no offers.</em></td></tr>'));
            }
            return $el;
        }
    });

})(window.J2 = window.J2 || {}, jQuery);