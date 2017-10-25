	<div id="ticket_field_data" class="panel woocommerce_options_panel">
		<div class="options_group show_if_ticket">
			<div class="form-field ticket_fields">
				<table class="widefat">
					<thead>
						<tr>
							<th>
								<?php _e( 'Label', 'woocommerce-box-office' ); ?>
								<?php if ( function_exists( 'wc_help_tip' ) ) : ?>
									<?php echo wc_help_tip( __( 'The field label as it is shown to the user.', 'woocommerce-box-office' ) ); ?>
								<?php else : ?>
									<span class="tips" data-tip="<?php _e( 'The field label as it is shown to the user.', 'woocommerce-box-office' ); ?>">[?]</span>
								<?php endif; ?>
							</th>
							<th><?php _e( 'Type', 'woocommerce-box-office' ); ?></th>
							<th>
								<?php _e( 'Auto-fill', 'woocommerce-box-office' ); ?>
								<?php if ( function_exists( 'wc_help_tip' ) ) : ?>
									<?php echo wc_help_tip( __( 'Choose the customer\'s billing field from which data is auto-filled as well as what options are available for applicable field types.', 'woocommerce-box-office' ) ); ?>
								<?php else : ?>
									<span class="tips" data-tip="<?php _e( 'Choose the customer\'s billing field from which data is auto-filled as well as what options are available for applicable field types.', 'woocommerce-box-office' ); ?>">[?]</span>
								<?php endif; ?>
							</th>
							<th><?php _e( 'Required', 'woocommerce-box-office' ); ?></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th colspan="5">
								<a href="#" class="button insert" data-row="<?php
									$field = array(
										'label'          => '',
										'type'           => '',
										'options'        => '',
										'autofill'       => '',
										'email_contact'  => 'yes',
										'email_gravatar' => 'yes',
										'required'       => 'yes',
									);
									$field_types      = wc_box_office_ticket_field_types();
									$autofill_options = wc_box_office_autofill_options();
									ob_start();
									include( WCBO()->dir . 'includes/views/admin/ticket-field.php' );
									echo esc_attr( ob_get_clean() );
								?>"><?php _e( 'Add Field', 'woocommerce-box-office' ); ?></a>
							</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$ticket_fields = get_post_meta( $post->ID, '_ticket_fields', true );
						$row = 'alternate';
						if ( $ticket_fields ) {
							foreach ( $ticket_fields as $key => $field ) {
								include( WCBO()->dir . 'includes/views/admin/ticket-field.php' );
								if ( 'alternate' === $row ) {
									$row = '';
								} else {
									$row = 'alternate';
								}
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="ticket_content_data" class="panel woocommerce_options_panel">
		<div class="options_group show_if_ticket">
			<?php woocommerce_wp_checkbox( array( 'id' => '_print_tickets', 'wrapper_class' => 'show_if_ticket', 'label' => __( 'Enable ticket printing', 'woocommerce-box-office' ), 'description' => __( 'This will enable the \'Print ticket\' button on the ticket edit page.', 'woocommerce-box-office' ) ) ); ?>

			<?php
			if ( function_exists( 'WC_Order_Barcodes' ) ) {
				woocommerce_wp_checkbox( array( 'id' => '_print_barcode', 'wrapper_class' => 'show_if_ticket', 'label' => __( 'Include barcode', 'woocommerce-box-office' ), 'description' => __( 'This will add the unique ticket barcode to the bottom of the ticket.', 'woocommerce-box-office' ) ) );
			}
			?>
		</div>
		<div class="options_group show_if_ticket">
			<p><?php _e( 'This is the content that will be shown on each printed ticket.', 'woocommerce-box-office' ); ?></p>
			<p class="ticket-label-variables-info">
				<?php _e( 'Add ticket fields to the content by using following labels: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-label-variables"></span>
			</p>
			<p>
				<?php _e( 'You can also use this ticket product variables: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-post-vars">
					<a href="#"><code>{post_title}</code></a>
					<a href="#"><code>{post_content}</code></a>
				</span>
			</p>
			<?php
			$ticket_content = get_post_meta( $post->ID, '_ticket_content', true );

			$settings = array(
				'wpautop' => true,
				'media_buttons' => true,
				'textarea_name' => 'ticket-content',
				'textarea_rows' => 30,
				'editor_class' => 'ticket_content_editor',
				'teeny' => false,
				'dfw' => false,
				'tinymce' => true,
				'quicktags' => true,
			);

			wp_editor( $ticket_content, 'ticket-content-editor', $settings );
			?>
		</div>
	</div>

	<div id="ticket_email_data" class="panel woocommerce_options_panel">
		<div class="options_group show_if_ticket">
			<?php woocommerce_wp_checkbox( array( 'id' => '_email_tickets', 'wrapper_class' => 'show_if_ticket', 'label' => __( 'Enable ticket emails', 'woocommerce-box-office' ), 'description' => __( 'This will send an email to the contact address for each ticket whenever it is changed.', 'woocommerce-box-office' ) ) ); ?>

			<?php woocommerce_wp_text_input( array( 'id' => '_email_ticket_subject', 'class' => 'full', 'label' => __( 'Email subject', 'woocommerce-box-office' ), 'description' => sprintf( __( 'Add ticket fields to the subject by inserting the field label like this: %1$s<br>e.g. %2$s', 'woocommerce-box-office' ), '<code>{Label}</code>', '<code>{First Name}</code>' ) ) ); ?>
		</div>
		<div class="options_group show_if_ticket">
			<p class="ticket_email"><?php _e( 'This is the content that will make up each email.', 'woocommerce-box-office' ); ?>
			</p>
			<p class="ticket-label-variables-info">
				<?php _e( 'Add ticket fields to the content by using following labels: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-label-variables"></span>
			</p>
			<p>
				<?php _e( 'To insert ticket link use: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-link-var">
					<a href="#"><code>{ticket_link}</code></a>
				</span>
			</p>
			<p>
				<?php _e( 'To insert ticket token use: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-token-var">
					<a href="#"><code>{token}</code></a>
				</span>
				<?php _e( 'Ticket token can be used to build private content link, e.g. <code>http://example.com/private?token={token}</code>', 'woocommerce-box-office' ); ?>
			</p>
			<p>
				<?php _e( 'You can also use this ticket product variables: ', 'woocommerce-box-office' ); ?>
				<span class="ticket-post-vars">
					<a href="#"><code>{post_title}</code></a>
					<a href="#"><code>{post_content}</code></a>
				</span>
			</p>

			<?php
			$ticket_email_html = get_post_meta( $post->ID, '_ticket_email_html', true );

			$settings = array(
				'wpautop' => true,
				'media_buttons' => true,
				'textarea_name' => 'ticket-email',
				'textarea_rows' => 30,
				'editor_class' => 'ticket_email_editor',
				'teeny' => false,
				'dfw' => false,
				'tinymce' => true,
				'quicktags' => true,
			);

			wp_editor( $ticket_email_html, 'ticket-email-editor', $settings );
			?>
		</div>
	</div>
