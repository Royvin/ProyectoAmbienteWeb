$(document).ready(function() {
    $('form').on('submit', function(e) {
        let isValid = true;

        $(this).find('[required]').each(function() {
            if ($(this).val() === '' || $(this).val() === null) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Por favor complete todos los campos obligatorios.');
        }
    });
});