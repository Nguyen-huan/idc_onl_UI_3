( function( api ) {

	// Extends our custom "vw-hosting-services" section.
	api.sectionConstructor['vw-hosting-services'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );