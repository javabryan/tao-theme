<?php
if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_5d9233cff02ef',
		'title'                 => 'Custom Categories',
		'fields'                => array(
			array(
				'key'               => 'field_5d925951bb00e',
				'label'             => 'Color',
				'name'              => 'color',
				'type'              => 'select',
				'instructions'      => 'Pick a color',
				'required'          => 1,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(
					'pink'        => 'Pink',
					'purple'      => 'Purple',
					'red'         => 'Red',
					'deep-purple' => 'Deep Purple',
					'indigo'      => 'Indigo',
					'blue'        => 'Blue',
					'light-blue'  => 'Light Blue',
					'cyan'        => 'Cyan',
					'teal'        => 'Teal',
					'green'       => 'Green',
					'light-green' => 'Light Green',
					'orange'      => 'Orange',
					'brown'       => 'Brown',
					'blue-gray'   => 'Blue Gray',
					'bright-pink' => 'Bright Pink',
					'magenta'     => 'Magenta',
				),
				'default_value'     => array(
					0 => 'red',
				),
				'allow_null'        => 0,
				'multiple'          => 0,
				'ui'                => 0,
				'return_format'     => 'value',
				'ajax'              => 0,
				'placeholder'       => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'taxonomy',
					'operator' => '==',
					'value'    => 'category',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	) );

endif;