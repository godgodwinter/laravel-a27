//eksekusi ketika document ready
$(document).ready(function() {
    var keyword = document.getElementById("keyword");
    var tombolCari = document.getElementById('tombolcari');
    var container = document.getElementById('container');
    //sembunyikan tombol cari
    $('#tombolcari').hide();
    //lakukan pencarian pada halaman pencarian
    $('#keyword').on('keyup', function() {
        $('#container').load('pencarian/edit/' + $('#keyword').val());
    });
    //buat form ketika di klik

});