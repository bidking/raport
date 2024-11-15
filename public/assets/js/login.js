function openTab(evt, tabName) {
    // Menyembunyikan semua konten tab
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Menghapus kelas "active" dari semua tombol tab
    var tablinks = document.getElementsByClassName("tablinks");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
    }

    // Menampilkan konten tab yang sesuai
    document.getElementById(tabName).style.display = "block";

    // Menambahkan kelas "active" ke tab yang dipilih
    evt.currentTarget.classList.add("active");

    // Mengubah nilai hidden input user_type
    if (tabName === 'Teacher') {
        document.getElementById('user_type').value = 'teacher';
    } else {
        document.getElementById('user_type').value = 'student';
    }
}
