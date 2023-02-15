// 
(function (Drupal, $) {
    "use strict";
    Drupal.behaviors.welcomeMessage = {
        attach: function (context, settings) {
            $(context).find('#alert').click(function() {
                alert( "Welcome to " + settings.sitename );
            })
            var btn = '<input  type="button" id="alert" value="Click To Sees Website Name" class="button js-form-submit form-submit">';
            $(document).find('body').once().append(btn);
        }
    };
}) (Drupal, jQuery);
