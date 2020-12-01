
Drupal.behaviors.jobClick = {
  attach: function (context, settings) {

          jQuery(" .check-all-job-icon").click(function(){
            jQuery(this).parents(".data-wrapper-table").find(".data-wrapper-item").toggle();
          });

          jQuery(" .data-wrapper-item  .check-all-item-icon").click(function(){
           $fired_button_checkbox= jQuery(this);
           jQuery($fired_button_checkbox).parents(".data-wrapper-item").find(".data-wrapper-table").toggle();
          });


      jQuery(".check-all-job input[type='checkbox']").change(function () {
            jQuery(this).parents(".data-wrapper-table .form-wrapper").find("input[type='checkbox']").prop('checked', this.checked);
          });

      jQuery(".data-wrapper-checkbox input[type='checkbox']").change(function () {
                jQuery(this).parents(".data-wrapper-item").find("input[type='checkbox']").prop('checked', this.checked);
      });
  }
};

jQuery(document).ajaxComplete(function( event, xhr, settings ) {
  if ( settings.url == "/wardsD7/?q=system/ajax" ) {
       jQuery(".form-item-connot input").focus();
       jQuery(".form-item-connot input").val("");
  }
});
