(function(namespace, $, undefined) {

    namespace.ProductTableRow = Backbone.View.extend({

          tagName: 'tr'

        , className: 'product-row'

        , events: {
            "click .productToggle" : "toggleState"
        }

        , render: function(){

            if(this.model.get('active') == 0) {
                this.$el.addClass('disabled');
            } else {
                this.$el.removeClass('disabled');
            }
            
            var offersCount = 0;
            if(this.model.get('offers').length > 0) {
                offersCount = this.model.get('offers').length;
            }
            
            var productName = this.model.get('name');
            if(productName.length > 40) {
                prodcutName = productName.substring(0,40) + '..';
            }

            this.$el.empty().append(

                $('<td></td>', {
                    html: '<a href="/products/product/' + this.model.get('id') + '" class="webStatsLink">' + productName + '</a>'
                })

                , $('<td></td>', {
                    html: '$' + this.model.get('price'),
                    style: 'text-align: center'
                })

                , $('<td></td>', {
                    html: this.model.get('code'),
                    style: 'text-align: center'
                })

                , $('<td></td>', {
                    html: '<b>' + offersCount + '</b>',
                    style: 'text-align: center'
                })
            )

            if(this.model.get('active') > 0) {

                this.$el.append(
                    '<td style="text-align: center">' +
                        '<a href="#" class="productToggle">' +
                            '<img src="/bundles/j2exchange/images/icons/color/tick.png" alt="enabled">' +
                        '</a>' +
                    '</td>'
                );

            } else {

                this.$el.append(
                    '<td style="text-align: center">' +
                        '<a href="#" class="productToggle">' +
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
                    url: '/api/products/setActive/' + this.model.get('id') + '/0',
                    dataType: 'json'
                });
                
                this.model.set('active', 0);
                this.render();
                
            } else {
                
                $.ajax({
                    url: '/api/products/setActive/' + this.model.get('id') + '/1',
                    dataType: 'json'
                });
                
                this.model.set('active', 1);
                this.render();
            }
        }

    });

    namespace.ProductsTable = Backbone.View.extend({
        tagName: 'tbody'
        , className: 'products-table'

        , initialize: function() {
            this.collection.on('remove', this.render, this);
            this.collection.on('add', this.addRow, this);
            this.collection.on('reset', this.render, this);
        }

        , render: function() {
            var $el = $(this.el);
            $el.empty();

            if ( !this.collection.size() ) {
                $el.append($('<tr><td colspan="100%" style="text-align: left;"><em>You have no products.</em></td></tr>'));
            }
            this.collection.each( function(model) {
                that.addRow(model);
            });

            return this;
        }

        , addRow: function(model) {
            this.$('.no-products').remove();
            this.$el.append(new J2.ProductTableRow({model: model}).render().$el);
        }
    });

})(window.J2 = window.J2 || {}, jQuery);