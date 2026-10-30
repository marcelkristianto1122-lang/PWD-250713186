var iHari;
var sAnggota;

iHari = prompt ("Masukan jumlah hari Keterlambatan: ", 1);
sAnggota = prompt ("Anggota perpustakaan: (Y)a atau (T)idak: ", "Y");

if (iHari > 7 && sAnggota == "Y") {
    if(sAnggota == "Y") {
        alert("Denda Rp 10.000, pinjaman dibekukan");
    } else {
        alert("Denda Rp 20.000, pinjaman dibekukan");
    }
} else{
    if(sAnggota == "Y") {
        alert("Denda Rp 2.000");
    } else {
        alert("Denda Rp 5.000");
    }
}