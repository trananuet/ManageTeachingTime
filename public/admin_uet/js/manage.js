(function($) {
    // Checkbox toggle function for selecting all checkboxes on the page
    $.fn.toggleCheckRemove = function() {
        // Get all checkbox elements
        checkboxes = $(':checkbox').not(this);

        // Check if the checkboxes are checked and if so uncheck them
        if (this.is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    }
}(jQuery));
$('#checkbox-all').change(function() {
    $(this).toggleCheckRemove();
});