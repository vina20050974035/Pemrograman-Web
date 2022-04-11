<?php
include('./data-list.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TUGAS ARRAY</title>
  <link rel="stylesheet" href="./filecss/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css" media="all">
  <script src="./filecss/js/bootstrap.bundle.js"></script>

</head>
<body>
    <header>
        <h1>Pemrograman Web</h1>
        <h3>Tugas Array</h3>
    </header>
    <div id="contents">
        <main class="container p-3">
            <section id="soal-1" class="mb-4">
              <br><h3 align="center">1. Soal Array</h3>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead class="bg-primary text-white text-center">
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>NRP</th>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    $no_urut = 1;
                    $index = 0;
                    $max = count($arrMahasiswa);
                    do {
                      $index++;

                      if (
                        ($arrMahasiswa[$index - 1]['ipk'] > 3.00 && $arrMahasiswa[$index - 1]['ipk'] < 3.25) &&
                        ($arrMahasiswa[$index - 1]['warna_rambut'] == 'HITAM' && $arrMahasiswa[$index - 1]['rambut'] == 'LURUS') &&
                        ($arrMahasiswa[$index - 1]['bb'] == 50 && $arrMahasiswa[$index - 1]['tb'] == 160) &&
                        ($arrMahasiswa[$index - 1]['status'] == 'AKTIF')
                      ) {
                        echo '<tr>
                            <td>' . $no_urut++ . '</td>
                            <td>' . $arrMahasiswa[$index - 1]["nama"] . '</td>
                            <td>' . $arrMahasiswa[$index - 1]["nrp"] . '</td>
                          </tr>';
                      }
                    } while (
                      ($index < $max)
                    );
                    ?>

                    <tr></tr>
                  </tbody>
                </table>
              </div>
            </section>

            <section id="soal-2" class="mb-4">
              <h3 align="center">2. Soal Sorting</h3>

              <?php
              $no_urut = 1;
              $index = 0;
              $max = count($arrMahasiswa);

              function sortDataNama($index = 0, $max, array $array)
              {
                array_multisort(array_column($array, 'nama'), SORT_ASC, $array);
                $output = "";
                do {
                  $index++;

                  if (
                    ($array[$index - 1]['ipk'] > 3.00 && $array[$index - 1]['ipk'] < 3.25) &&
                    ($array[$index - 1]['warna_rambut'] == 'HITAM' && $array[$index - 1]['rambut'] == 'LURUS') &&
                    ($array[$index - 1]['bb'] == 50 && $array[$index - 1]['tb'] == 160) &&
                    ($array[$index - 1]['status'] == 'AKTIF')
                  ) {
                    $output .= '
                                    <p>
                                      ' . $array[$index - 1]['nama'] . '
                                    </p>
                                    ';
                  }
                } while (
                  ($index < $max)
                );

                return $output;
              }

              function sortDataNrp($index = 0, $max, array $array)
              {
                array_multisort(array_column($array, 'nrp'), SORT_DESC, $array);
                $output = "";
                do {
                  $index++;

                  if (
                    ($array[$index - 1]['ipk'] > 3.00 && $array[$index - 1]['ipk'] < 3.25) &&
                    ($array[$index - 1]['warna_rambut'] == 'HITAM' && $array[$index - 1]['rambut'] == 'LURUS') &&
                    ($array[$index - 1]['bb'] == 50 && $array[$index - 1]['tb'] == 160) &&
                    ($array[$index - 1]['status'] == 'AKTIF')
                  ) {
                    $output .= '<p>
                                  ' . $array[$index - 1]['nrp'] . '
                                </p>';
                  }
                } while (
                  ($index < $max)
                );

                return $output;
              }

              echo '
              <div class="row g-2">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header bg-primary text-white">
                    2a. Sort Nama ASC
                    </div>
                    <div class="card-body">
                    ' . sortDataNama($index, $max, $arrMahasiswa) . '
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header bg-primary text-white">
                    2b. Sort NRP DESC
                    </div>
                    <div class="card-body">
                    ' . sortDataNrp($index, $max, $arrMahasiswa) . '
                    </div>
                  </div>
                </div>
              </div>
              ';
              ?>
            </section>

            <section id="soal-3">
              <h3 align="center">3. Soal Function</h3>

              <?php
              $no_urut = 1;
              $index = 0;
              $max = count($arrMahasiswa);

              function infoDiriMahasiswa($array, $key, $nrp)
              {
                $results = array();

                if (is_array($array)) {
                  if (isset($array[$key]) && $array[$key] == $nrp) {
                    $results['dataMhs'] = $array;
                  }
                  foreach ($array as $subarray) {
                    $results = array_merge(
                      $results,
                      infoDiriMahasiswa($subarray, $key, $nrp)
                    );
                  }
                }

                return $results;
              }

              $cari = infoDiriMahasiswa($arrMahasiswa, 'nrp', '20050974035');

              if (count($cari)) {
                if (($cari['dataMhs']['kelas'] == 'D4-A' || $cari['dataMhs']['kelas'] == 'D4-B') &&
                  ($cari['dataMhs']['dosen_wali'] == 'DESY INTAN PERMATASARI') &&
                  ($cari['dataMhs']['nilai'] == 'A') &&
                  ($cari['dataMhs']['status'] == 'AKTIF')
                ) :
                  echo $cari['dataMhs']['nama'] . ' adalah mahasiswa kelas ' . $cari['dataMhs']['kelas'] . ' yang aktif di HIMIT';
                else :
                  echo 'Kondisi tidak terpenuhi!';
                endif;
              } else {
                echo 'Data mahasiswa tidak ditemukan!';
              }

              ?>
            </section>
</main>
    </div>
    <footer>
        &copy Design By Vina Maulidiya Agustin | 20050974035
    </footer>
</body>

</html>