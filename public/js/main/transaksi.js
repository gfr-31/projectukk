var tanggalContainer = document.getElementById("tanggalContainer");
const namaHari = [
    "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"
];
const currentDate = new Date();
const hari = namaHari[currentDate.getDay()];
const tanggal = currentDate.getDate();
const bulan = currentDate.toLocaleString('id-ID', { month: 'long' }); 
const tahun = currentDate.getFullYear();
const formattedDate = hari + ", " + tanggal + "-" + bulan + "-" + tahun;
// Menambahkan tanggal ke dalam konten HTML di dalam <td>
tanggalContainer.innerHTML += formattedDate;