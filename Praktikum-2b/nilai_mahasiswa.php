<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proses = $_POST['proses'];
    $nama_siswa = $_POST['name'];
    $mata_kuliah = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];

    function tentukanKelulusan($uts, $uas, $tugas) {
        $total = ($uts * 0.30) + ($uas * 0.35) + ($tugas * 0.35);
        $status = ($total > 55) ? "LULUS" : "TIDAK LULUS";
        
        // Menentukan grade
        if ($total < 0 || $total > 100) {
            $grade = 'I';
        } elseif ($total <= 35) {
            $grade = 'E';
        } elseif ($total <= 55) {
            $grade = 'D';
        } elseif ($total <= 69) {
            $grade = 'C';
        } elseif ($total <= 84) {
            $grade = 'B';
        } else {
            $grade = 'A';
        }

        // Menentukan predikat
        switch ($grade) {
            case 'E':
                $predikat = "Sangat Kurang";
                break;
            case 'D':
                $predikat = "Kurang";
                break;
            case 'C':
                $predikat = "Cukup";
                break;
            case 'B':
                $predikat = "Memuaskan";
                break;
            case 'A':
                $predikat = "Sangat Memuaskan";
                break;
            default:
                $predikat = "Tidak ada";
                break;
        }

        return [$total, $status, $grade, $predikat];
    }

    list($total, $status, $grade, $predikat) = tentukanKelulusan($nilai_uts, $nilai_uas, $nilai_tugas);

    echo "Proses: $proses<br>";
    echo "Nama: $nama_siswa<br>";
    echo "Mata Kuliah: $mata_kuliah<br>";
    echo "Nilai UTS: $nilai_uts<br>";
    echo "Nilai UAS: $nilai_uas<br>";
    echo "Nilai Tugas: $nilai_tugas<br>";
    echo "Total Nilai: " . number_format($total, 2) . "<br>";
    echo "Status: $status<br>";
    echo "Grade: $grade<br>";
    echo "Predikat: $predikat<br>";
}

?>
