$(document).ready(function () {
    var table = document.getElementById('tableMembre');
    function editMembre(){
        
        for(var i=0; i<table.rows.length; i++){
            table.rows[i].onclick=function()
            {
                document.getElementById("mIdMembre").value = this.cells[1].innerHTML;
                document.getElementById("mNomMembre").value = this.cells[2].innerHTML;
                document.getElementById("mPrenomMembre").value = this.cells[3].innerHTML;
                document.getElementById("mAdresseMembre").value = this.cells[4].innerHTML;
                document.getElementById("mDateMembre").value = this.cells[5].innerHTML;
                document.getElementById("mTelMembre").value = this.cells[6].innerHTML;
                document.getElementById("mMailMembre").value = this.cells[7].innerHTML;
            }
        }
    }
   $('.editer').click(function (e) { 
    e.preventDefault();
    editMembre();   
   });
});
