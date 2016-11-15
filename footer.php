
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">

			<?php echo __('&copy; ', 'restaurateur') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
<!-- Remove footer branding
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'restaurateur'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'restaurateur' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'restaurateur' ); ?>"><?php _e('WordPress' ,'restaurateur'); ?></a>
			<?php _e(' and ', 'restaurateur'); ?><a href="<?php echo esc_url( __( 'http://wprestaurateur.com/', 'restaurateur' ) ); ?>"><?php _e('WP Restaurateur', 'restaurateur'); ?></a>
            <?php endif; ?>
-->
            
		</div>
	</footer><!-- #colophon -->
</div><!-- #container -->

<?php wp_footer(); ?>

<!-- Trigger calendar updates to change available times -->

<script type="text/javascript">
(function($, window) {
  $.fn.replaceOptions = function(options) {
    var self, $option;

    this.empty();
    self = this;

    $.each(options, function(index, option) {
      $option = $("<option></option>")
        //.attr("value", option.value)
        .text(option.text);
      self.append($option);
    });
  };
})(jQuery, window);

jQuery("#reservation-date").change(function(e) {
  var dow = new Date(document.getElementById("reservation-date").value).getDay();

  var val = jQuery('select#reservation-time option:selected').text();

  // if Sunday
  if(dow == 0) {
    // set available times for Sunday
    var options = [
      {text: "11:30 AM", value: 11.50},
      {text: "11:45 AM", value: 11.75},
      {text: "12:00 PM", value: 12},
      {text: "12:15 PM", value: 12.25},
      {text: "12:30 PM", value: 12.50},
      {text: "12:45 PM", value: 12.75},
      {text: "13:00 PM", value: 13},
      {text: "13:15 PM", value: 13.25},
      {text: "13:30 PM", value: 13.50},
      {text: "13:45 PM", value: 13.75},
      {text: "14:00 PM", value: 14},
      {text: "14:15 PM", value: 14.25},
      {text: "14:30 PM", value: 14.50},
      {text: "14:45 PM", value: 14.75},
      {text: "15:00 PM", value: 15},
      {text: "---", value: 0},
      {text: "6:00 PM", value: 18},
      {text: "6:15 PM", value: 18.25},
      {text: "6:30 PM", value: 18.50},
      {text: "6:45 PM", value: 18.75}, 
      {text: "7:00 PM", value: 19}, 
      {text: "7:15 PM", value: 19.25}, 
      {text: "7:30 PM", value: 19.50}, 
      {text: "7:45 PM", value: 19.75}, 
      {text: "8:00 PM", value: 20}, 
      {text: "8:15 PM", value: 20.25}, 
      {text: "8:30 PM", value: 20.50}, 
      {text: "8:45 PM", value: 20.75}, 
      {text: "9:00 PM", value: 21}, 
      {text: "9:15 PM", value: 21.25}, 
      {text: "9:30 PM", value: 21.50}, 
      {text: "9:45 PM", value: 21.75}, 
      {text: "10:00 PM", value: 22}, 
      {text: "10:15 PM", value: 22.25}, 
      {text: "10:30 PM", value: 22.50}, 
      {text: "10:45 PM", value: 22.75}, 
      {text: "11:00 PM", value: 23}, 
      {text: "11:15 PM", value: 23.25}, 
      {text: "11:30 PM", value: 23.50}, 
      {text: "11:45 PM", value: 23.75}
    ];
  } else {
    // set available diner only times
    var options = [
      {text: "6:00 PM", value: 6},
      {text: "6:15 PM", value: 6.25},
      {text: "6:30 PM", value: 6.50},
      {text: "6:45 PM", value: 6.75}, 
      {text: "7:00 PM", value: 7}, 
      {text: "7:15 PM", value: 7.25}, 
      {text: "7:30 PM", value: 7.50}, 
      {text: "7:45 PM", value: 7.75}, 
      {text: "8:00 PM", value: 8}, 
      {text: "8:15 PM", value: 8.25}, 
      {text: "8:30 PM", value: 8.50}, 
      {text: "8:45 PM", value: 8.75}, 
      {text: "9:00 PM", value: 9}, 
      {text: "9:15 PM", value: 9.25}, 
      {text: "9:30 PM", value: 9.50}, 
      {text: "9:45 PM", value: 9.75}, 
      {text: "10:00 PM", value: 10}, 
      {text: "10:15 PM", value: 10.25}, 
      {text: "10:30 PM", value: 10.50}, 
      {text: "10:45 PM", value: 10.75}, 
      {text: "11:00 PM", value: 11}, 
      {text: "11:15 PM", value: 11.25}, 
      {text: "11:30 PM", value: 11.50}, 
      {text: "11:45 PM", value: 11.75}
    ];
  }
  jQuery("#reservation-time").replaceOptions(options);
  jQuery("#reservation-time").val(val);
  if (jQuery("#reservation-time").val() != val) {
    jQuery("#reservation-time").val(options[0].text);
  }

});

</script>

</body>
</html>