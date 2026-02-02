console.log('jeu');
let solution = (Math.round(Math.random()*101));
console.log(solution);
alert('Début du jeu');
let debut = Date.now();
let valeur = prompt('Trouvez la valeur entre 0 et 100 ?');
let tour = 1;
// let Depart = Date.now();
// console.log(Depart);
//while (valeur != solution) { // on créé la condition du jeu ; pas la strict égalité car la valeur issu du prompt est en sortie un chaine de caractère et pas un nombre comme solution
while (Number(valeur) !== solution) { // ici on a changé le type de valeur pour le convertir en nombre est faire la strict égalité
    console.log(tour += 1);
    if (valeur > solution) {
        valeur = prompt('Trop grand !');
        console.log('grand');
    } 
    else{
        valeur = prompt('Trop petit !');
        console.log('petit');
    }
};
let fin = Date.now();
let chrono = ((fin - debut)/1000);
alert('Gagné ! La solution était ' + solution); // une fois sortie de la boucle, on affiche le message gagnant !
alert('Tu as trouvé en ' + chrono + 's !');
