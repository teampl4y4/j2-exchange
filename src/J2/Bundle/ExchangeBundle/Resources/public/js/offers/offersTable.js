(function(namespace, $, undefined) {

    namespace.OfferTableRow = Backbone.View.extend({

          tagName: 'tr'

        , className: 'offer-row'

        , events: {
            "click .offerToggle" : "toggleState"
        }

        , render: function(){
            console.log('rendering row');
            this.$el.empty().append(

                $('<td></td>', {
                    html: '<a href="/offers/offer/' + this.model.get('id') + '" class="webStatsLink">' + this.model.get('matches').length + '</a>',
                    style: 'text-align: center'
                })

                , $('<td></td>', {
                    html: '<a href="/offers/offer/' + this.model.get('id') + '">' + this.model.get('name') + '</a>'
                })

                , $('<td></td>', {
                    html: '$' + this.model.get('listPrice'),
                    style: 'text-align: center'
                })

                , $('<td></td>', {
                    html: '$' + this.model.get('whisperPrice'),
                    style: 'text-align: center'
                })

                , $('<td></td>', {
                    html: this.model.get('available'),
                    style: 'text-align: center'
                })
            )

            if(this.model.get('active') > 0) {

                this.$el.append(
                    '<td style="text-align: center">' +
                        '<a href="#" class="offerToggle">' +
                            '<img src="/bundles/j2exchange/images/icons/color/tick.png" alt="enabled">' +
                        '</a>' +
                    '</td>'
                );

            } else {

                this.$el.append(
                    '<td style="text-align: center">' +
                        '<a href="#" class="offerToggle">' +
                            '<img src="/bundles/j2exchange/images/icons/color/cross.png" alt="disabled">' +
                        '</a>' +
                    '</td>'
                );
            }

            return this;
        }

        , toggleState: function()
        {
            if(this.model.get('active') > 0) {
                alert('currently on - need to turn off');
            } else {
                alert('currently off - need to turn on');
            }
        }

    });

    namespace.OffersTable = Backbone.View.extend({
        tagName: 'tbody'
        , className: 'offers-table'

        , initialize: function() {
            this.collection.on('remove', this.render, this);
            this.collection.on('add', this.addRow, this);
            this.collection.on('reset', this.render, this);
        }

        , render: function() {
            var $el = $(this.el);
            $el.empty();

            if ( !this.collection.size() ) {
                $el.append($('<tr><td colspan="100%" style="text-align: left;"><em>You have no offers.</em></td></tr>'));
            }
            this.collection.each( function(model) {
                that.addRow(model);
            });

            return this;
        }

        , addRow: function(model) {
            console.info('Adding Single Row');
            this.$('.no-offers').remove();
            this.$el.append(new J2.OfferTableRow({model: model}).render().$el);
        }
    });

})(window.J2 = window.J2 || {}, jQuery);