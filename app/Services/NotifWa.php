<?php
namespace App\Services;

class NotifWa
{
    public static function NotifWa($target, $pesan)
    {
        // Inisialisasi cURL
        $curl = curl_init();

        // Set URL tujuan
        curl_setopt($curl, CURLOPT_URL, 'https://api.fonnte.com/send');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        // Set opsi curl lainnya
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query(
                    array(
                        'target' => $target,
                        'message' => $pesan,
                        'countryCode' => '62',
                        'delay' => '5-10',
                    )
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ksmxkFxjoTkanT@MJBeJ'
                ),
            )
        );

        // Eksekusi curl dan simpan respon
        $response = curl_exec($curl);

        // Tangani kesalahan jika ada
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }

        // Tutup koneksi curl
        curl_close($curl);

        // Tampilkan respon atau pesan kesalahan
        if (isset($error_msg)) {
            echo $error_msg;
        } else {
            echo $response;
        }
    }
}
