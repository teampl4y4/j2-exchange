(function(namespace, $, undefined) {

    namespace.OfferTableRow = Backbone.View.extend({

          tagName: 'tr'

        , className: 'offer-row'

        , events: {
            "click .offerToggle" : "toggleState"
        }

        , render: function(){

            if(this.model.get('active') == 0) {
                this.$el.addClass('disabled');
            } else {
                this.$el.removeClass('disabled');
            }
            
            var matchesCount = 0;
            if(this.model.get('matches').length > 0) {
                matchesCount = this.model.get('matches').length;
            }
            
            var offerName = this.model.get('name');
            if(offerName.length > 25) {
                offerName = offerName.substring(0,25) + '..';
            }

            this.$el.empty().append(

                $('<td></td>', {
                    html: '<a href="/offers/offer/' + this.model.get('id') + '" class="webStatsLink">' + offerName + '</a>'
                })

                , $('<td></td>', {
                    html: '<b>' + matchesCount + '</b>',
                    style: 'text-align: center'
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
                
                $.ajax({
                    url: '/api/offers/setActive/' + this.model.get('id') + '/0',
                    dataType: 'json'
                });
                
                this.model.set('active', 0);
                this.render();
                
            } else {
                
                $.ajax({
                    url: '/api/offers/setActive/' + this.model.get('id') + '/1',
                    dataType: 'json'
                });
                
                this.model.set('active', 1);
                this.render();
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
            this.$('.no-offers').remove();
            this.$el.append(new J2.OfferTableRow({model: model}).render().$el);
        }
    });

})(window.J2 = window.J2 || {}, jQuery);