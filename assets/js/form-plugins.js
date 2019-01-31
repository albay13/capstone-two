$(document).ready(function(){
    $(".multiple_select").select2();
    $(".multiple_select").select2({
        placeholder: "Select a state",
        allowClear: true
    });
    $('.minicolors').each(function(){
        $(this).minicolors({
            theme:"bootstrap",
            control:$(this).attr("data-control")||"hue",
            format: $(this).attr('data-format') || 'hex',
            opacity:$(this).attr("data-opacity"),
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            position: $(this).attr('data-position') || 'bottom left',
        });
    });
});
