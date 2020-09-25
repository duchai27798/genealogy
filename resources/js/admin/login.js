$('#login-form').submit(function (e) {
    e.preventDefault();

    /* Get form data */
    let x = $(this).serializeArray();
    let formData = {};

    $.each(x, function(i, field) {
        formData[field.name] = field.value;
    });

    $.ajax({
        url: '/login',
        method: 'post',
        dataType: 'json',
        data: formData,
        success: function (res) {
            if (_.get(res, 'accessToken')) {
                localStorage.setItem('accessToken', _.get(res, 'accessToken'));
                window.location.href = '/admin';
            } else {
                $('#login-error').html('Failed login');
            }
        },
        error: function (res) {
            const error = _.flatten(_.values(_.get(res, 'responseJSON.errors')));

            $('#login-error').html(_.join(error, '<br>') || _.get(res, 'responseJSON.message'));
        }
    })
})
