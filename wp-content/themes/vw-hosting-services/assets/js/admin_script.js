jQuery(document).ready(function($) {

    // Append row functionality
    $('.add-row.button').on('click', function () {
        var row_length = $(this).closest('.repeater-wrap').find('.repeater-table-row').length;
        row_length = parseFloat(row_length);

        var row_html = $(this).closest('.repeater-wrap').find('.empty-row.screen-reader-text').html();
        row_html = row_html.replace(/rand_no/g, row_length);

        $(this).closest('.repeater-wrap').find('tbody').append('<tr class="repeater-table-row">' + row_html + '</tr>');

        return false;
    });

    // Remove row functionality
    $(document).on('click', '.remove-row', function () {
        
        var rowsParent = $(this).closest('.repeater-wrap');
        
        $(this).closest('.repeater-table-row').remove();

        var rows = rowsParent.find('tbody .repeater-table-row');  

        rows.each(function (index, element) {
            var inputs = $(element).find('input');
            inputs.each(function (inputIndex, inputElement) {
                var name = $(inputElement).attr('name');
                if (name) {
                    name = name.replace(/\[\d+\]/, '[' + index + ']');
                    $(inputElement).attr('name', name);
                }
            });
        });

        return false;
    });
});

