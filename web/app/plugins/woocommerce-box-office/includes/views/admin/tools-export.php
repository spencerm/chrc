<form action="" method="get">
	<input type="hidden" name="post_type" value="event_ticket">
	<input type="hidden" name="page" value="ticket_tools">
	<input type="hidden" name="tab" value="export">
	<input type="hidden" name="action" value="export_tickets">

	<p><?php _e( 'Export attendee data for the following chosen tickets:', 'woocommerce-box-office' ); ?></p>

	<select name="tickets[]" class="chosen_select ticket-product-select" style="width:300px" required multiple>
		<?php foreach ( wc_box_office_get_all_ticket_products() as $product ) : ?>
			<option value="<?php echo esc_attr( $product->ID ); ?>"><?php echo esc_html( $product->post_title ); ?></option>
		<?php endforeach ?>
	</select>

	<p>
		<label>
			<input type="checkbox" name="only_published_tickets" checked />
			<?php _e( 'Only export published tickets', 'woocommerce-box-office' ); ?>
		</label>
	</p>

	<p class="buttons">
		<input type="submit" value="<?php _e( 'Download Export File (CSV)', 'woocommerce-box-office' ); ?>" class="button-primary">
	</p>
</form>
