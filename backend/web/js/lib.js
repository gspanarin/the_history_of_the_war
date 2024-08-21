$( document ).ready(function() {
    
    $(document).on('click', '.add-tag-value', function (e) {
        var tag = this.dataset.tag;
        var container = $('.container-tag-value.tag-' + tag).first();
        var new_element = container.find('.tag-value-item').first().clone();
        new_element.find('.form-control').val('');
        //if ($(new_element).hasClass("krajee-datepicker")){
        if(new_element.find(".krajee-datepicker").length !== 0){
            var tmp = new_element.find(".form-control");
            $(function(){
                $(tmp).kvDatepicker(kvDatepicker_27e5e49d);
            });
        }
        
        //$(new_element).autocomplete({"source":"\/official\/dictionary\/search","minLength":"2"});
        new_element.find('.add-tag-value').removeClass('add-tag-value').removeClass('btn-success').addClass('remove-tag-value').addClass('btn-danger');
        new_element.find('.fa.fa-plus').removeClass('fa-plus').addClass('fa-minus');        
        new_element.appendTo(container);
    });

    $(document).on('click', '.remove-tag-value', function (e) {
        $(this).closest('.tag-value-item').remove();
    })
});

$(function () {
    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
         $( ".picker" ).each(function() {
            $( this ).datepicker({
            dateFormat : 'dd-mm-yy',
            language : 'en',
            changeMonth: true,
            changeYear: true
          });
        });
    });
});