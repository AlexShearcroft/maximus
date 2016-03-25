define(['Backbone'], function (Backbone) {

    return Backbone.View.extend({

        initialize: function(){

        },
        
        el: $('body'),
        
        events: {
            'click .js-example'  : 'example'
        },

        example: function(e) {

        }

    });

});