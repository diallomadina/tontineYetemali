$(document).ready(function () {
    
    //Action apres le click du bouton envoyee
    $('#btnValiderAjoutCoti').click(function (e) { 
        e.preventDefault();
        if( $('#txtMontantCoti').val("")){
            $('#pErMontant').attr('class', 'd-bloc text-danger');
        }

        if( $('#selectMembreCoti').val("Selectionnez le membre")){
            $('#pErMembre').attr('class', 'd-bloc text-danger');
        }

        if( $('#selectTontineCoti').val("Selectionnez la tontine")){
            $('#pErTontineCoti').attr('class', 'd-bloc text-danger');
        }
        const regex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
        if(!regex.test($('#dtCoti').val())){
           $('#pErDate').attr('class', 'd-bloc text-danger'); 
        }
    });

    $('#txtRechercheCotiTontine').keyup(function (e) { 
        
        var contenue = document.getElementById('tbodyAfficheTontine');
        var searchTontine = document.getElementById('txtRechercheCotiTontine').value;
         for(let ligne of contenue.rows){
            var collone = ligne.cells[1];
            var valeur = collone.textContent;
            if(valeur === searchTontine){
                ligne.style.display = "table-row";

            } else {
                ligne.style.display = "none";
            }
         }
    });

    $('#btnPrintCoti').click(function (e) { 
        e.preventDefault();
        elementAmasquer = document.querySelectorAll('header, .header, aside, .pagetitle, .acacher');
        for(var i=0; i<elementAmasquer.length; i++){
            elementAmasquer[i].style.display='none';
            
        }
       var composant = `
       <div class="container mb-5">
                <div class="row">
                     <div class="col-6">
                       <img src="assets/img/yetemali.jpg" alt="">
                     </div>
                     
                     <div class="col-6">
                       <h1 class="text-center">Caisse populaire d'Epargne et de Credit</h1>
                     </div>
                </div>
            <h3 class="text-center"> Liste des cotisations </h3>
        </div>
       `;
       $('#blocTable').prepend(composant);
        window.print();
        $(composant).remove();
        for(var i=0; i<elementAmasquer.length; i++){
            elementAmasquer[i].style.display='block';
        }
       
    });
});