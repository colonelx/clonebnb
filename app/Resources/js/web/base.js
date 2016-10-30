jQuery(document).ready(function($) {

    $(document).foundation();

    $('.delete-item').on( 'click', function(e) {
        e.preventDefault();
        var name = $(this).data('name');
        var href = $(this).attr('href');
        var choice = confirm('Delete "' + name + '"?');
        if(choice) window.location = href;
    });
});
