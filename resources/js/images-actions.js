$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.remove-product-image', function (e) {
        e.preventDefault();
        // console.log('success');
        let $btn = $(this);

        $.ajax({
            url: $btn.data('route'),
            type: 'DELETE',
            dataType: 'json',
            success: function (data) {
                $btn.parent().remove();
                console.log('Success: ', data);
            },
            error: function (data) {
                console.log('Error: ', data);
            }
        });
    })
});
