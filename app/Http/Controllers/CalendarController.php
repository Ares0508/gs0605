<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Truck;

class CalendarController extends Controller
{
    
    public function setResources(){
        
        $resources = Truck::all();

        $newArr = [];
        foreach($resources as $item){
            $newItem["id"] = $item["id"];
            $newItem["title"] = $item["truck"];
            $newArr[] = $newItem;
        }
        //新たな配列を用意し、 EventsObjectが対応している配列にキーの名前を変更する

        echo json_encode($newArr);
    }

    public function setEvents(Request $request){

        $start = $this->formatDate($request->all()['start']);
        $end = $this->formatDate($request->all()['end']);
        //表示した月のカレンダーの始まりの日を終わりの日をそれぞれ取得。

        $events = Appointment::select('id', 'title', 'start', 'truck_id')->whereBetween('start', [$start, $end])->get();
        //カレンダーの期間内のイベントを取得

        $newArr = [];
        foreach($events as $item){
            $newItem["id"] = $item["id"];
            $newItem["title"] = $item["title"];
            $newItem["resourceId"] = $item["truck_id"];
            $newItem["start"] = $item["start"];
            $newItem["end"] = $item["end"];
            
            $newArr[] = $newItem;
        }
        //新たな配列を用意し、 EventsObjectが対応している配列にキーの名前を変更する

        echo json_encode($newArr);
        //json形式にして出力
    }

    public function formatDate($date){
        return str_replace('', '', $date);
    }
    // "2019-12-12T00:00:00+09:00"のようなデータを今回のDBに合うように"2019-12-12"に整形

    public function addEvent(Request $request)
    {
        $data = $request->all();
        $event = new Appointment();
        $event->id = $this->generateId();
        //僕はmodel.phpでuuidを作成する関数を書いていましたが、みなさんはご自由に。
        $event->start = $data['start'];
        $event->end = $data['end'];
        $event->title = $data['title'];
        $event->resourceId = $data['truck_id'];
        $event->save();

        return response()->json(['id' => $event->id ]);
    }
    // ajaxで受け取ったデータをデータベースに追加し、今度はidを返す。

    public function editEventDate(Request $request){
        $data = $request->all();
        $event = Appointment::find($data['id']);
        $event->start = $data['newStart'];
        $event->end = $data['newEnd'];
        $event->save();
        return null;
    }
    // ajaxで受け取ったデータからデータベースの日付データを変更。


}
