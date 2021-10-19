<?php
add_filter(
	'ninja_forms_submit_data',
	function( $form_data ) {
		$form_fields = Ninja_Forms()->form( $form_data['id'] )->get_fields();

		foreach ( $form_fields as $id => $form_field ) {
			$form_data['fields'][ $id ]['id'] = $id;

			if ( ! isset( $form_data['fields'][ $id ]['value'] ) ) {
				$form_data['fields'][ $id ]['value'] = '';
			}
		}

		return $form_data;
	},
	0,
	1
);
