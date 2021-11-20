$(document).on("input", "#mensagem", function () {
    var limite = 500;
    var caracteresDigitados = $(this).val().length;
    var caracteresRestantes = limite - caracteresDigitados;

    $(".caracteres").text(caracteresRestantes);
});