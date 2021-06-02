<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Auth;

class DistanceController extends Controller
{
    public function search(Request $request)
    {
        return \App\Models\PostalCode::whereSearch(
            $request->first_code,
            $request->last_code
        )->first();
    }

    // --------------------------------------------------------------------
    //  車での移動時間取得
    // --------------------------------------------------------------------
    public function GetDrivingDistance($from_address, $to_address)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . urlencode($from_address) . "&destinations=" . urlencode($to_address) . "&mode=driving&language=ja&key=AIzaSyDA7mma9lmt96_A7nFHZdXpWl8HVEVmbb4";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        //$dist = $response_a['rows'][1]['legs']['distance']['text'];
        //$time = $response_a['rows'][1]['legs']['duration']['text'];

        return array('distance' => $dist, 'time' => $time);
        //return array($response_a);
    }

    //-------------------------------------
    //  Ajax距離計算
    //-------------------------------------
    public function index(Request $request, $mode = 'form', $target = 'user', $table = 'distance', $id = '1')
    {

        //'mode' => $mode,
        //-------------------------------------
        //  距離計算
        //-------------------------------------
        if ($mode == "calc") {
            //------------------------
            //両方7桁の場合のみ計算
            //------------------------
            if (mb_strlen($request->from_zipcode) == 7 && mb_strlen($request->to_zipcode) == 7) {

                //------------------------------------
                //再取得を防ぐ、データがあるならを最初に
                //（＊課金可能性を減らすため）
                //------------------------------------
                $record = DB::table('distances')
                    ->where('from_zipcode', $request->from_zipcode)
                    ->where('to_zipcode', $request->to_zipcode)
                    ->get();
                if (count($record) > 0) {
                    foreach ($record as $distance_record) {
                        $return_message = $distance_record->take_time_by_car;
                        return $return_message;
                        exit;
                    }
                }
                //------------------------
                //郵便番号から住所作成
                //------------------------
                //3桁と4桁に分割
                //------------------------
                $from_zipcode1 = mb_substr($request->from_zipcode, 0, 3);
                $from_zipcode2 = mb_substr($request->from_zipcode, 3, 4);
                $to_zipcode1 = mb_substr($request->to_zipcode, 0, 3);
                $to_zipcode2 = mb_substr($request->to_zipcode, 3, 4);

                //------------------------
                //桁数を合わせるために頭についている「０」を削除（DBの型が数値保存のため）
                //------------------------
                $from_zipcode1 = (int)$from_zipcode1;
                $from_zipcode2 = (int)$from_zipcode2;
                $to_zipcode1 = (int)$to_zipcode1;
                $to_zipcode2 = (int)$to_zipcode2;

                //------------------------
                //出発地
                //------------------------
                $record = \App\Models\PostalCode::query()
                    ->where('first_code', $from_zipcode1)
                    ->where('last_code', $from_zipcode2)->get();
                if (count($record) > 0) {
                    foreach ($record as $address_record) {
                        $from_address = $address_record->prefecture . '' . $address_record->city . '' . $address_record->address;
                    }
                } else {
                    $from_address = "";
                }
                //------------------------
                //目的地
                //------------------------
                $record = \App\Models\PostalCode::query()
                    ->where('first_code', $to_zipcode1)
                    ->where('last_code', $to_zipcode2)->get();
                if (count($record) > 0) {
                    foreach ($record as $address_record) {
                        $to_address = $address_record->prefecture . '' . $address_record->city . '' . $address_record->address;
                    }
                } else {
                    $to_address = "";
                }
                //------------------------
                //  debug   ok
                //------------------------
                //dd($from_address . '--->' . $to_address);
                //dd($from_zipcode1 .'-'. $from_zipcode2 . '---->' .$to_zipcode1 . '-' . $to_zipcode2);
                //------------------------
                //データが取得できたなら
                //------------------------
                if (mb_strlen($from_address) > 0 && mb_strlen($to_address) > 0) {

                    $dist = $this->GetDrivingDistance($from_address, $to_address);
                    //echo 'Distance: <b>'.$dist['distance'].'</b>  Travel time duration: <b>'.$dist['time'].'</b>';
                    //$return_message = $dist;
                    $return_message = $dist['time'];
                    $time_stamp = date('Y-m-d H:i:s');

                    //------------------------
                    //DB保存
                    //------------------------
                    $count = DB::table('distances')->count();
                    $set_id = $count + 1;
                    $param = [
                        'id' => $set_id,
                        'from_zipcode' => $request->from_zipcode,
                        'to_zipcode' => $request->to_zipcode,
                        'from_address' => $from_address,
                        'to_address' => $to_address,
                        'take_time_by_car' => $dist['time'],
                        'distance_by_car' => $dist['distance'],
                        'created_at' => $time_stamp,
                        'updated_at' => $time_stamp,
                    ];
                    DB::table('distances')->insert($param);

                } else {
                    $return_message = "ご入力された7桁の郵便番号に該当する住所が見つかりません";
                }

            } else {
                //$return_message = $request->from_zipcode .'--->'. $request->to_zipcode;
                $return_message = "出発地、目的地ともに7桁の郵便番号をご入力ください";
            }
            return $return_message;
            exit;
        } else {
            $return_message = $mode;
        }

        //-------------------------------------
        //  ビューファイルへ受け渡し
        //-------------------------------------
        return view('distance.index', [
            'mode' => $return_message,
            'target' => $target,
            'table' => $table,
            'id' => $id,
            'user_id' => '',
            'user_name' => '',
            'message_count' => '',
        ]);
    }
}
