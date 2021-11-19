var dinheiroInvestido = document.querySelector("div.dinheiro-investido");
var prazoMeses = document.querySelector("div.prazo-meses");
var jurosGanhos = document.querySelector("div.juros-ganhos");
var lucroBruto = document.querySelector("div.lucro-bruto");
var totalGanhos = document.querySelector("div.total-ganhos");
var imposto = document.querySelector("div.imposto-sobre-ganhos");

dinheiroInvestido.style.display = "none";
prazoMeses.style.display = "none";
jurosGanhos.style.display = "none";
lucroBruto.style.display = "none";
totalGanhos.style.display = "none";
imposto.style.display = "none";

function calcular () {
    dinheiroInvestido.style.display = "inline-block";
    prazoMeses.style.display = "inline-block";
    jurosGanhos.style.display = "inline-block";
    lucroBruto.style.display = "inline-block";
    totalGanhos.style.display = "inline-block";
    imposto.style.display = "inline-block";

    var inputValorInvestido = document.querySelector("input#valorInvestir");
    var inputPrazo = document.querySelector("input#prazo");
    var inputRentabilidade = document.querySelector("input#rentabilidade");

    var lucro = inputValorInvestido.value * (inputRentabilidade.value / 100 * inputPrazo.value);
    // var lucro = inputValorInvestido.value * (inputRentabilidade.value / 100) / inputPrazo.value;
    
    var apenasLucro = lucro - inputValorInvestido.value;
    var impostoSobreGanhos =  lucro - (apenasLucro * 0.175);

    dinheiroInvestido.innerHTML = "Você investiu R$ " + inputValorInvestido.value;
    prazoMeses.innerHTML = "Por " + inputPrazo.value + " Meses";
    jurosGanhos.innerHTML = "Com rentabilidade de " + inputRentabilidade.value + "% ao ano";
    lucroBruto.innerHTML = "Recebeu o valor bruto de R$ " + apenasLucro.toFixed(2);
    totalGanhos.innerHTML = "Totalizando R$ " + lucro.toFixed(2);
    imposto.innerHTML = "Imposto sobre ganhos de 17.5%, R$ " + impostoSobreGanhos.toFixed(2);

}