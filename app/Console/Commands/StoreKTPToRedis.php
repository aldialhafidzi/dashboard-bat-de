<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Wilayah_2018;
use App\Consumer;
use App\ValidConsumer;
use App\EntryRejectKtp;
use App\EntryRejectWilayah;
use App\EntryRejectBorn;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class StoreKTPToRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:storeKTPtoRedis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Wilayah_2018::chunk(200, function ($wilayah) {
        //     foreach ($wilayah as $data) {
        //         Redis::set("kode_wilayah:$data->kode", $data->nama);
        //         var_dump($data->kode);
        //     }
        // });
        
        // $result = Consumer::whereRaw('LENGTH(ktp_id) >= 16')->get();
        // $ktp_consumer = array();
        // Consumer::whereRaw('LENGTH(ktp_id) >= 16')->chunk(200, function ($wilayah) use($ktp_consumer) {
        //     foreach ($wilayah as $data) {
        //         $ktp_id = $data->ktp_id;
        //         array_push($ktp_consumer, $ktp_id);
        //         var_dump($data->ktp_id);
        //     }    
        // });

        // Redis::lpush('KTP-Consumer', $ktp_consumer);
        // die('asdasd');

        var_dump('Checking Data . . .');

        $length_data = Redis::llen('KTP-Consumer');
        $values = Redis::command('lrange', ['KTP-Consumer', 0, $length_data]);
        
        $validWilayah       = 0;
        $invalidWilayah     = 0;
        $validBornCount     = 0;
        $invalidBornCount   = 0;
        $validKTP           = 0;
        $invalidKTP         = 0;
        $entryKtpReject     = [];
        $entryWilayahReject = [];
        $entryCountReject   = [];


         function validateDate($date, $format = 'dmy'){
             $d = DateTime::createFromFormat($format, $date); 
             return $d && $d->format($format) === $date;
         }

        function trimKtp($ktp) {
            $data = $ktp;
            if ($data != null || $data == '') {
                $data = (string)$data;
                $data = rtrim($data, ' ');
                $data = rtrim($data, '-');
                $data = rtrim($data, '.');
                $data = rtrim($data, ',');
                $data = rtrim($data, '+');
                
                $count_ = (int) (strlen($data));

                if ($count_ !== 16) {
                    return false;
                }

                $str  = substr($data, 6, 2);
                $tgl  = intval($str, $base = 10);

                $tgl  = $tgl >= 40 ? ($tgl -= 40) : $tgl;
                $date = (string)$tgl . substr($data, 8, 4);
                $date = strlen($date) === 6 ? $date : "0$date";
                
                // CHECK VALIDASI TGL
                if(validateDate($date) == false){
                    return false;
                }
                // END OF VALIDASI TGL
            }
            return true;
        }

        

        foreach ($values as $key => $value) {
            $ktp = trimKtp($value);
            if($ktp == true){
                $validKTP++;
                $enam_digit_awal = substr($value, 0, 6);

                if (Redis::exists("kode_wilayah:$enam_digit_awal") == 1){
                    $validWilayah++;
                }
                else {
                    array_push($entryWilayahReject, $enam_digit_awal); 
                    $invalidWilayah++;
                }

                $bornCount      = substr($value, 12, 4);
                $bornCount      = intval($bornCount, $base = 10);
        
                if ($bornCount <= 50) {
                    $validBornCount++;
                }
                else {
                    array_push($entryCountReject, $bornCount);
                    $invalidBornCount++;
                }
            }
            else{
                array_push($entryKtpReject, $value);
                $invalidKTP++;
            }
        }

        $data = [
            'valid_ktp'          => $validKTP,
            'invalid_ktp'        => $invalidKTP,
            'validwilayah'      => $validWilayah,  
            'invalidwilayah'    => $invalidWilayah,
            'validcount'        => $validBornCount,
            'invalidcount'      => $invalidBornCount,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ];

        ValidConsumer::insert($data);

        dd('KELAR');

        // foreach ($entryKtpReject as $key => $value) {
        //     $data = [
        //         'ktp_id' => $value
        //     ];

        //     EntryRejectKtp::insert($data);

        // }

        // foreach ($entryWilayahReject as $key => $value) {
        //     $data = [
        //         'wilayah' => $value
        //     ];

        //     EntryRejectWilayah::insert($data);
        // }

        // foreach ($entryCountReject as $key => $value) {
        //     $data = [
        //         'date_reject_born' => $value
        //     ];

        //     EntryRejectBorn::insert($data);
        // }

        dd('INI BARU BERES!!!!');
    }
}
