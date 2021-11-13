var dinheiroInvestido = document.querySelector("div.dinheiro-investido");
var prazoMeses = document.querySelector("div.prazo-meses");
var jurosGanhos = document.querySelector("div.juros-ganhos");
var totalGanhos = document.querySelector("div.total-ganhos");
var imposto = document.querySelector("div.imposto-sobre-ganhos");

function calcular () {
    var inputValorInvestido = document.querySelector("input#valorInvestir");
    var inputPrazo = document.querySelector("input#prazo");
    var inputRentabilidade = document.querySelector("input#rentabilidade");

    var lucro = inputValorInvestido.value * (inputRentabilidade.value / 100 * inputPrazo.value);

    var impostoSobreGanhos = lucro - (lucro * 0.175);

    dinheiroInvestido.innerHTML = "Você investiu R$ " + inputValorInvestido.value;
    prazoMeses.innerHTML = "Por " + inputPrazo.value + " Meses";
    jurosGanhos.innerHTML = "Com rentabilidade de " + inputRentabilidade.value + "%";
    totalGanhos.innerHTML = "Totalizando R$ " + lucro.toFixed(2);
    imposto.innerHTML = "Imposto sobre ganhos de 17.5%, R$ " + impostoSobreGanhos.toFixed(2);

}