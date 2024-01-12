( function( api ) {

	// Extends our custom "software-it-company" section.
	api.sectionConstructor['software-it-company'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );