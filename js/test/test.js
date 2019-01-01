// alert("Ceci est du js");
//
// console.log("Bonjour en JavaScript !");
//
// let a;
// console.log(a);

//En js les variables peuvent soit stocker une valeur primitive, soit un objet

// var primitive = "Je suis une valeur primitive";
// var longueur_prim = primitive.length;
// var maj_prim = primitive.toUpperCase();
//
// var chaine = new String("Je suis un objet");
// var maj_chain = chaine.toUpperCase();
//
//
// alert('Longueur de primitive : ' + longueur_prim +
//       '\nPrimitive en majuscules : ' + maj_prim +
//       '\nChaine en majuscules : ' + maj_chain);



// ================= Création objet ==========================


// -----  creation de l'objet moi en littéral------
// var moi = {
//   prenom : "Yliès",
//   nom : "Rochdi",
//   age : 23,
//
//   identite : function(){
//     return  'Prénom : ' + this.prenom +
//             '\nNom : ' + this.nom +
//             '\nAge : ' + this.age;
//   }
// }
//
// alert(moi.identite());


// ----- Autre méthode de creation d'un objet avec la syntaxe new -------
// var objet = new Object();
//
// objet.prenom = "Satoshi";
// objet.age = 1;
//
// alert(objet.prenom);


// --- Création d'un objet à partir d'un constructeur ---
// function Identite(p, n ,a){
//   this.prenom = p;
//   this.nom = n;
//   this.age = a;
// }
//
// var ylies = new Identite("Yliès", "Rochdi", "23");
// var marie = new Identite("Marie", "Arnal" , "22");
//
// alert("Age d'Yliès : " + ylies.age +
//       "\nAge de Marie : " + marie.age);



// ============ Méthodes objet String =====================

// 3 propriété et 20ène de méthodes

// .toLowerCase()     transformer chaine en minuscules
// .toUpperCase()     transformer chaine en majuscules
// .charAt(i)         récupère le ième caractère d'une chaine
// .indexOf('p')      recherche la première occurence du caractère 'p' d'une chaine (sensible à la case)
// .indexOf('p',4)    recherche la première occurence du caractère 'p' à partir de la position 4
// .lastIndexOf('p')  recherche la dernière occurence du 'p' d'une chaine
// .indexOf('le')     recherche la première occurence de al séquence 'le' d'une chaine

// .replace("Java", "PHP") permet de changer la séquence "Java" par "PHP" dans une chaine
// .slice(0,10)       extraction des caractères indexés de 0 à 10 de la chaine de caractères
// .slice(-10,-1)     extraction du 10ème caractère en partant de la fin jusqu'au dernier

// .trim()            supprimer les espaces superflues en début et en fin de chaine

// ============== Méthodes objet Number ======================

// 5 propritétés

// .MIN_VALUE           valeur minimum de l'objet
// .MAX_VALUE           valeur maximum de l'objet
// .NEGATIVE_INFINITY   valeur infini negatif
// .POSITIVE_INFINITY   valeur infini positive
// .NaN

// .toString()          tranforme un nombre en chaine de caractères
// .toFixed(n)          limite l'affichage des nombres décimaux à n et traforme en chaine de caractères
// .toPrevceision(n)    renvoie n de chiffres à partir de celui du plus au poids, puis renvoie une String
// .toExponential(n)    renvoie n décimal puis affichage le nombre sous prodruit de puissance de 10 et renvoie un string

// Number(i)            converti la variable i en nombre
// parseInt             renvoie un entier
// parseFloat           renvoie un décimal

// ===================== Objet Array ============================

// var prenoms = ['Pierre', 'Mohammed', 'Xiun', 'Zadik'];
//
// prenoms[prenoms.length] = 'Khan'; //rajoute la veuleur 'Khan' à la fin du tableau
// p = '';
// for(var i=0; i<prenoms.length; i++){
//   p+= "Prenom n°" + (i+1) + " : " + prenoms[i] + '\n';
// }
// alert(p);

// ------ objet litéral ----------
// alert("yep");
//
// var prenoms =  {
//     prenom1 : 'Nadia',
//     prenom2 : 'Chen',
//     prenom3 : 'Marie'
// };
// alert(prenoms.prenom2);
// p = '';
// for(var clefs in prenoms){ //pour les indices notés clefs du tableau noté prenoms
//   p+= clefs + ' : ' + prenoms[clefs] + '\n';
// }
// alert(p);


//------------------ Méthodes objet Array ------------------------

// .push(k)           ajouter la valeur k à la fin du tableau
// .push(k,l)         ajoute la valeur k à la fin du tableau puis ajoute la valeur l à la fin du tableau
// .pop()             supprime le dernier élément du tableau
// .unshift(k,l)      ajoute en début du tableau la valeur k suivi de la valeur l
// .shift()           supprimer la première valeur du tableau
// .splice(1,0,k,l)   1 : indice de l'ajout au tableau; 0 : nombre d'élément que l'on souhaite supprimé; k et l : valeurs que l'on souhaite ajouter dans le tableau
// .sort()            classe les éléments du tableau dans l'ordre alphabétique, majuscule puis minuscules
// .reverse()         classe les éléments dans l'ordre alphabétique inverse
// .join('/')         renvoie une chaine de caractères (sans modifier le tableau) constituée de tous les éléments du tableau séparés par le séparateur choisi en l'occurence '/'
// .slice(a,b)        extraction du tableau de l'indice a jusqu'à l'indice b
// .concat(x)         concatene le tableau x à la suite du tableau initial

modal();
