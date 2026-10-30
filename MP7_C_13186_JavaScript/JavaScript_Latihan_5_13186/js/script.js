function fn_ValForm(){
    var  kosong = "";
    var cekValidasiEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
    var qnama = document.getElementById("nama").value;
    var qemail = document.getElementById("email").value ;
    var qumur = document.getElementById("umur").value;
    var qfavorit = document.getElementById("kategori").value;

    if(qnama == ""  || qemail == ""  || qumur == "" || qfavorit == ""){
       kosong += "\n *Masukan data diri anda "; 
    }

    if(!cekValidasiEmail == qemail){
        kosong += "Peringatan: Format email belum benar";
    }

    if( qumur <= 17 ){
        qumur = "Anggota Pelajar";
    }else{
        qumur = "Anggota Umum";
    }
    switch(qfavorit){
        case "F":
            qfavorit = "Fiksi";
            break;
        case "N":
            qfavorit = "Non-Fiksi";
            break;
        case "J":
            qfavorit = "Jurnal Ilmah";
            break;
    }
    if(kosong != ""){
        alert("Peringatan:\n"+ kosong);
        return false;
    }else{
        alert ("Terima kasih" + qnama + "! Andaterdaftar di koleksi" + qfavorit + qumur);
        return true;
    }       
}