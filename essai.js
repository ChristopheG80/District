let cpt=document.getElementById('cpt');
let cpt2=document.getElementById('cpt2');
let aller=document.getElementById('Aller');
let retour=document.getElementById('Retour');
let timecnt;

let flagEnd=false;


aller.addEventListener("click", function(e){
    e.preventDefault();
    compte();
});
// aller.addEventListener("blur", resetCpt());    
retour.addEventListener("click", function(e){
    e.preventDefault();
    resetCpt();
});

function compte(){
    console.log("coucou1");
    timecnt=setInterval(compteur,1000);
}

function compteur(){
    console.log("coucou2");
    cpt.value = parseInt(cpt.value)+1;
}

function resetCpt(){
    console.log("coucou3");

    cpt2.value = parseInt(cpt.value); // + parseInt(Math.random()*5);
    clearInterval(timecnt);
    cpt.value=0;
}