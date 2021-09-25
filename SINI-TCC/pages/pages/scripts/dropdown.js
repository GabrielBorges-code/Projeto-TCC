$(document).ready(function () {
    //Cache dos elementos em variáveis
    var botao = $('.botao');
    var dropDown = $('.dropDown');
    //Clica no botão para abrir e fechar o dropDown
    botao.on('click', function (event) {
        dropDown.stop(true, true).slideToggle();
        //Evita que o evento seja notificado aos outros elementos. 
        event.stopPropagation();
    });

    //Clicando no html vai fechar o dorpDown
    $('html').on('click', function () {
        dropDown.slideUp();
    });
});

//Efeito Tooltip
$(document).ready(function () {
    // Tooltip only Text
    $('.tp').hover(function () {
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip"></p>')
            .text(title)
            .appendTo('body')
            .fadeIn('fast');
    }, function () {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
    }).mousemove(function (e) {
        var mousex = e.pageX + 5; //Get X coordinates
        var mousey = e.pageY + 5; //Get Y coordinates
        $('.tooltip')
            .css({ top: mousey, left: mousex })
    });
});