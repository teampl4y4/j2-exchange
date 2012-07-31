(function ($) {
    $.extend(Backbone.View.prototype, {

        parse: function(objName) {
            var self = this,
            recurse_form = function(object, objName) {
                $.each(object, function(v,k) {
                    if (k instanceof Object) {
                        object[v] = recurse_form(k, objName + '[' + v + ']');
                    } else {
                        object[v] = self.$('[name="'+ objName + '[' + v + ']"]').val();
                    }
                });
                return object;
            };
            this.model.attributes = recurse_form(this.model.attributes, objName);
        },

        populate: function(objName) {
            var self = this,
            recurse_obj = function(object, objName) {
                $.each(object, function (v,k) {
                    if (v instanceof Object) {
                        recurse_obj(v, k);
                    } else if (_.isString(v)) {
                        self.$('[name="'+ objName + '[' + v + ']"]').val(k);
                    }
                });
            };
            recurse_obj(this.model.attributes, objName);
        }
    });

})(jQuery);