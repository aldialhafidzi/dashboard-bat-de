<?php

namespace App\Console\Commands;

// use Cache;
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
        // Wilayah_2018::all
        // $ss = Cache::get('name');
        // $ss = Cache::get('name');
        // dd($ss);
        // Wilayah_2018::chunk(200, function ($wilayah) {
        //     foreach ($wilayah as $data) {
        //         Redis::set("kode_wilayah:$data->kode", $data->nama);
        //         echo($data->kode);
        //     }
        // });
        // Consumer::chunk(200, function ($wilayah) {

        //     foreach ($wilayah as $data) {
        //         Redis::set("KTP:$data->kode", $data->nama);
        //         echo($data->kode);
        //     }
            
        // });
        $length_data = Redis::llen('KTP-Consumer');
        // dd($length_data);
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


         function validateDate($date, $format = 'dmy')
                {$d = DateTime::createFromFormat($format, $date); return $d && $d->format($format) === $date;}


        function trimKtp($ktp) {
            $data = $ktp;
            if ($data || $data === '') {
                $data = (string)$data;
                $data = rtrim($data, '-');
                $data = rtrim($data, '.');
                $data = rtrim($data, ',');
                $data = rtrim($data, '\+');
                
                $count_ = (int) (strlen($data));

                echo($count_);
                echo('-');
                if ($count_ !== 16) {
                    return null;
                }

                $str = substr($data, 6, 2);
                $tgl = (int)  $str;
                $tgl = $tgl >= 40 ? ($tgl -= 40) : $tgl;
                $date = (string)$tgl . substr($data, 8, 4);
                $date = (int) $date;
                $date = $date === 6 ? $date : "0$date";
                
                // CHECK VALIDASI TGL
               
                if(validateDate($date) == false){
                    return null;
                }
                // END OF VALIDASI TGL

            }
            return $data;
        }

        
        foreach ($values as $key => $value) {
            $ktp = trimKtp($value);
            if($ktp){
                $validKTP++;
                $enam_digit_awal = substr($value, 0, 6);
                if (Redis::exists("kode_wilayah:$enam_digit_awal")){
                    $validWilayah++; 
                }
                else {
                    array_push($entryWilayahReject, $enam_digit_awal); 
                    $invalidWilayah++;
                }
                $bornTgl    = substr($value, 12, 4);
                $bornCount  = (int) $bornTgl;
        
                if ($bornCount >= 50) {
                    $validBornCount++;
                }
                else {
                    array_push($entryCountReject, $bornTgl);
                    $invalidBornCount++;
                }
            }
            else{
                array_push($entryKtpReject, $value);
                $invalidKTP++;
            }

            echo($value); echo('BELUM KELAR !');
        }

        $data = [
            'validWilayah'      => $validWilayah,  
            'invalidWilayah'    => $invalidWilayah,
            'validBornCount'    => $validBornCount,
            'invalidBornCount'  => $invalidBornCount,
            'validKTP'          => $validKTP,
            'invalidKTP'        => $invalidKTP
        ];

        ValidConsumer::insert($data);

        foreach ($entryKtpReject as $key => $value) {
            $data = [
                'ktp_id' => $value
            ];

            EntryRejectKtp::insert($data);

        }

        foreach ($entryWilayahReject as $key => $value) {
            $data = [
                'wilayah' => $value
            ];

            EntryRejectWilayah::insert($data);
        }

        foreach ($entryCountReject as $key => $value) {
            $data = [
                'date_reject_born' => $value
            ];

            EntryRejectBorn::insert($data);
        }


        // Redis::set('nama', 'oke');
        // $value = Redis::keys('*');
        dd('INI BARU BERES!!!!');

        // Redis::pipeline(function ($pipe) {
        //     for ($i = 0; $i < 1000; $i++) {
        //         $pipe->set("key:$i", $i);
        //     }
        // });
    }
}
