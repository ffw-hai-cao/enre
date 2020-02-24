(function($) {
  function loadTaxonomy() {
    console.log(ajaxurl);
    var variableToSend = 'heochaua';

    $.ajax({
        url: ajaxurl,
        type: "post",
        data: {name: variableToSend},
    });

    /*var listpost = [];
    $('.cf_view_post_type ul.cmb2-checkbox-list li .cmb2-option').change(function() {
      var input_val = $(this).val();
      if($(this).is( ":checked" ) == true) {
        listpost.push(input_val);
      } else {
        listpost = $.grep(listpost, function(value) {
          return value != input_val;
        });
      }

      var data = listpost;
    });*/
  }

  $(document).ready(function() {
    // Call to function
    loadTaxonomy();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });
})(jQuery);
