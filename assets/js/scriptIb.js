$(document).ready(function () {

    // Pour récupérer les données de l'agence
    var tableAgence = document.getElementById('tableAgence');

    function editerInfoAgence() {
        for (var i = 1; i < tableAgence.rows.length; i++) {
            tableAgence.rows[i].onclick = function () {
                document.getElementById("idAgence").value = this.cells[1].innerHTML;
                document.getElementById("nomAgence").value = this.cells[2].innerHTML;
                document.getElementById("telAgence").value = this.cells[3].innerHTML;
                document.getElementById("adresseAgence").value = this.cells[4].innerHTML;
            };
        }
    }

    $('.editAgence').click(function (e) {
        e.preventDefault();
        editerInfoAgence();
    });

    // Pour récupérer les données de la tontine individuelle


});
