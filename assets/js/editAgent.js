$(document).ready(function () {
    var table = document.getElementById('tableAffichageAgent');
    function editAgent(){
        
        for(var i=0; i<table.rows.length; i++){
            table.rows[i].onclick=function()
            {
                document.getElementById("mIdAgent").value = this.cells[1].innerHTML;
                document.getElementById("mMatriculeAgent").value = this.cells[2].innerHTML;
                document.getElementById("mNomAgent").value = this.cells[3].innerHTML;
                document.getElementById("mPrenomAgent").value = this.cells[4].innerHTML;
                document.getElementById("mAdresseAgent").value = this.cells[5].innerHTML;
                document.getElementById("mTelAgent").value = this.cells[6].innerHTML;
                document.getElementById("mMailAgent").value = this.cells[7].innerHTML;
            }
        }
    }
   $('.edit').click(function (e) { 
    e.preventDefault();
    editAgent();   
   });
});
