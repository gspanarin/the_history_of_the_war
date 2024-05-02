$( document ).ready(function() {
    
    $(document).on('click', '.add-tag-value', function (e) {
        var tag = this.dataset.tag;
        var container = $('.container-tag-value.tag-' + tag).first();
        var new_element = container.find('.tag-value-item').first().clone();
        new_element.find('input').val('');
        new_element.find('.add-tag-value').removeClass('add-tag-value').removeClass('btn-success').addClass('remove-tag-value').addClass('btn-danger');
        new_element.find('.fa.fa-plus').removeClass('fa-plus').addClass('fa-minus');        
        new_element.appendTo(container);
    });


    $(document).on('click', '.remove-tag-value', function (e) {
        $(this).closest('.tag-value-item').remove();
    })
});

