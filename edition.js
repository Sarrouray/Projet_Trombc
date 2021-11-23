/* ouvrir "Editer le profil" */

function ouvrirlapopup(){

    document.getElementById("inscrp").style.display='block';
    document.getElementById("opac").style.display='block';
}

  
 
/* fermer "Editer le profil" */

function fermerlapopup(){
    document.getElementById("inscrp").style.display='none';
    document.getElementById("opac").style.display='none';
}

/* ouvrir "Ajouter" photos de profil */

function ouvrirladeuxpopup(){

    document.getElementById("inscrp1").style.display='block';
    document.getElementById("opac1").style.display='block';
    document.body.style.overflow = "hidden";
    document.getElementById("inscrp").style.zIndex= 1;
    
}


/* fermer "Ajouter" photos de profil */

function fermerladeuxpopup(){
    document.getElementById("inscrp1").style.display='none';
    document.getElementById("opac1").style.display='none';
    document.body.style.overflow = "auto";
    document.getElementById("inscrp").style.zIndex= 1000;
}


/* ouvrir "Ajouter" photos de couverture */
function ouvrirlatroispopup(){

    document.getElementById("inscrp2").style.display='block';
    document.getElementById("opac1").style.display='block';
    document.body.style.overflow = "hidden";
    document.getElementById("inscrp").style.zIndex= 1;
    
}

/* fermer "Ajouter" photos de couverture */
function fermerlatroispopup(){
    document.getElementById("inscrp2").style.display='none';
    document.getElementById("opac1").style.display='none';
    document.body.style.overflow = "auto";
    document.getElementById("inscrp").style.zIndex= 1000;
}
