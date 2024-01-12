<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Hosting_Services_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'vw-hosting-services-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-hosting-services' ),
				'family'      => esc_html__( 'Font Family', 'vw-hosting-services' ),
				'size'        => esc_html__( 'Font Size',   'vw-hosting-services' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-hosting-services' ),
				'style'       => esc_html__( 'Font Style',  'vw-hosting-services' ),
				'line_height' => esc_html__( 'Line Height', 'vw-hosting-services' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-hosting-services' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-hosting-services-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-hosting-services-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-hosting-services' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-hosting-services' ),
        'Acme' => __( 'Acme', 'vw-hosting-services' ),
        'Anton' => __( 'Anton', 'vw-hosting-services' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-hosting-services' ),
        'Arimo' => __( 'Arimo', 'vw-hosting-services' ),
        'Arsenal' => __( 'Arsenal', 'vw-hosting-services' ),
        'Arvo' => __( 'Arvo', 'vw-hosting-services' ),
        'Alegreya' => __( 'Alegreya', 'vw-hosting-services' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-hosting-services' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-hosting-services' ),
        'Bangers' => __( 'Bangers', 'vw-hosting-services' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-hosting-services' ),
        'Bad Script' => __( 'Bad Script', 'vw-hosting-services' ),
        'Bitter' => __( 'Bitter', 'vw-hosting-services' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-hosting-services' ),
        'BenchNine' => __( 'BenchNine', 'vw-hosting-services' ),
        'Cabin' => __( 'Cabin', 'vw-hosting-services' ),
        'Cardo' => __( 'Cardo', 'vw-hosting-services' ),
        'Courgette' => __( 'Courgette', 'vw-hosting-services' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-hosting-services' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-hosting-services' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-hosting-services' ),
        'Cuprum' => __( 'Cuprum', 'vw-hosting-services' ),
        'Cookie' => __( 'Cookie', 'vw-hosting-services' ),
        'Chewy' => __( 'Chewy', 'vw-hosting-services' ),
        'Days One' => __( 'Days One', 'vw-hosting-services' ),
        'Dosis' => __( 'Dosis', 'vw-hosting-services' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-hosting-services' ),
        'Economica' => __( 'Economica', 'vw-hosting-services' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-hosting-services' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-hosting-services' ),
        'Francois One' => __( 'Francois One', 'vw-hosting-services' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-hosting-services' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-hosting-services' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-hosting-services' ),
        'Handlee' => __( 'Handlee', 'vw-hosting-services' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-hosting-services' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-hosting-services' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-hosting-services' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-hosting-services' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-hosting-services' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-hosting-services' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-hosting-services' ),
        'Kanit' => __( 'Kanit', 'vw-hosting-services' ),
        'Lobster' => __( 'Lobster', 'vw-hosting-services' ),
        'Lato' => __( 'Lato', 'vw-hosting-services' ),
        'Lora' => __( 'Lora', 'vw-hosting-services' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-hosting-services' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-hosting-services' ),
        'Merriweather' => __( 'Merriweather', 'vw-hosting-services' ),
        'Monda' => __( 'Monda', 'vw-hosting-services' ),
        'Montserrat' => __( 'Montserrat', 'vw-hosting-services' ),
        'Muli' => __( 'Muli', 'vw-hosting-services' ),
        'Marck Script' => __( 'Marck Script', 'vw-hosting-services' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-hosting-services' ),
        'Open Sans' => __( 'Open Sans', 'vw-hosting-services' ),
        'Overpass' => __( 'Overpass', 'vw-hosting-services' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-hosting-services' ),
        'Oxygen' => __( 'Oxygen', 'vw-hosting-services' ),
        'Orbitron' => __( 'Orbitron', 'vw-hosting-services' ),
        'Patua One' => __( 'Patua One', 'vw-hosting-services' ),
        'Pacifico' => __( 'Pacifico', 'vw-hosting-services' ),
        'Padauk' => __( 'Padauk', 'vw-hosting-services' ),
        'Playball' => __( 'Playball', 'vw-hosting-services' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-hosting-services' ),
        'PT Sans' => __( 'PT Sans', 'vw-hosting-services' ),
        'Philosopher' => __( 'Philosopher', 'vw-hosting-services' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-hosting-services' ),
        'Poiret One' => __( 'Poiret One', 'vw-hosting-services' ),
        'Quicksand' => __( 'Quicksand', 'vw-hosting-services' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-hosting-services' ),
        'Raleway' => __( 'Raleway', 'vw-hosting-services' ),
        'Rubik' => __( 'Rubik', 'vw-hosting-services' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-hosting-services' ),
        'Russo One' => __( 'Russo One', 'vw-hosting-services' ),
        'Righteous' => __( 'Righteous', 'vw-hosting-services' ),
        'Slabo' => __( 'Slabo', 'vw-hosting-services' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-hosting-services' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-hosting-services'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-hosting-services' ),
        'Sacramento' => __( 'Sacramento', 'vw-hosting-services' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-hosting-services' ),
        'Tangerine' => __( 'Tangerine', 'vw-hosting-services' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-hosting-services' ),
        'VT323' => __( 'VT323', 'vw-hosting-services' ),
        'Varela Round' => __( 'Varela Round', 'vw-hosting-services' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-hosting-services' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-hosting-services' ),
        'Volkhov' => __( 'Volkhov', 'vw-hosting-services' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-hosting-services' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-hosting-services' ),
			'100' => esc_html__( 'Thin',       'vw-hosting-services' ),
			'300' => esc_html__( 'Light',      'vw-hosting-services' ),
			'400' => esc_html__( 'Normal',     'vw-hosting-services' ),
			'500' => esc_html__( 'Medium',     'vw-hosting-services' ),
			'700' => esc_html__( 'Bold',       'vw-hosting-services' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-hosting-services' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-hosting-services' ),
			'normal'  => esc_html__( 'Normal', 'vw-hosting-services' ),
			'italic'  => esc_html__( 'Italic', 'vw-hosting-services' ),
			'oblique' => esc_html__( 'Oblique', 'vw-hosting-services' )
		);
	}
}
