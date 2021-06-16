@extends('layouts.app')

@section('content')

<main class="page-content">
    <div class="container">

        <table class="table table-sm table-bordered">
            <tr>
                <th>摘要</th>
                <th>数量</th>
                <th>単価</th>
                <th>金額</th>
            </tr>
            @if(isset($result['contract']['product']))
            @foreach($result['contract']['product'] as $k=>$p)
            <tr>
                <td>{{ $result['contract']['product'][$k] }}</td>
                <td>{{ $result['contract']['quantity'][$k] }}</td>
                <td>{{ $result['contract']['price'][$k] }}円</td>
                <td>{{ $result['contract']['amount'][$k] }}円</td>
            </tr>
            @endforeach
            @endif
        </table>

        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>ご依頼内容の確認：受付番号#{{$appoint->id}}-295</span>
            </div>
            <div class="card-body">
                <h5>注文</h5>
                <div class="d-flex justify-content-between">
                    <div class="col-12">
                        <span>お客様情報</span>
                        <div class="bg-light">{{$customer->name}}</div>
                        <div class="bg-light">{{$customer->phone}}</div>
                        <div class="bg-light">{{$address->postal_code}}</div>
                        <div class="bg-light">{{$address->prefecture}}</div>
                        <div class="bg-light">{{$address->city}}</div>
                        <div class="bg-light">{{$address->address}}</div>
                    </div>
                </div>


            </div>
        </div>




        <div class="card-outline-success mt-4">
            <div class="card-outline-success-header">
                <span>作業請負及び買取依頼確認同意書</span>
            </div>
            <div class="card-body">
                <div class="table-responsive vertical-align-middle">
                    {{ Form::open(array('url' => 'result', 'method'=> 'POST')) }}
                        <input type="hidden" name="target" value="signature">
                        <input type="hidden" name="key" value="detail">
                        <table class="table table-sm table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row">お見積日</th>
                                    <td>{{date('Y-m-d', strtotime($appoint->start))}}</td>
                                    <th scope="row">担当者</th>
                                    <td>{{$employee->name}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">御見積内容</p>

                        <table class="table table-sm table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">お名前</th>
                                    <td colspan="2">{{$result['basic']['name']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="w-25">見積内容</th>
                                    <td colspan="2">{{$result['basic']['estimate']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">作業場所</th>
                                    <td colspan="2">{{$result['basic']['address']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">作業日時</th>
                                    <td>{{$result['basic']['worktime']}}</td>
                                    <td>あああ</td>
                                </tr>
                                <tr>
                                    <th scope="row">支払条件</th>
                                    <td colspan="2">{{$result['basic']['payment']}}</td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="d-flex border-bottom mb-4">
                            <div>金額</div>
                            <div>40,000</div><div>円（税込）</div>
                        </div>



                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">支払い条件</p>

                        <table class="table table-sm table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">回収日</th>
                                    <td>
                                        <select id="" name="kaisyu" class="form-control form-control-sm" required>
                                            <option value="current_date">当日</option>
                                            <option value="contract">契約</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">支払い方法</th>
                                    <td>
                                        <select id="" name="payment_method" class="form-control form-control-sm"  required>
                                            <option value="cash">現金</option>
                                            <option value="transfer">振込</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">金額</th>
                                    <td><input type="text" name="payment_total" class="form-control form-control-sm" placeholder="" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">内金</th>
                                    <td><input type="text" name="payment_uchi" class="form-control form-control-sm" placeholder="" required></td>
                                    <th scope="row">残金</th>
                                    <td><input type="text" name="payment_zan" class="form-control form-control-sm" placeholder="" required></td>
                                </tr>
                            </tbody>
                        </table>






                        <p class="px-3 font-weight-bold" style="border-left: 5px solid #28A745;">お客様情報</p>

                        <table class="table table-sm table-bordered table-background">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25">ご住所</th>
                                    <td><input type="text" name="address" class="form-control form-control-sm" placeholder="" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">職業</th>
                                    <td><input type="text" name="job" class="form-control form-control-sm" placeholder="" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">お名前</th>
                                    <td><input type="text" name="name" class="form-control form-control-sm" placeholder="" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">生年月日</th>
                                    <td class="d-flex" style="border:none;">

                                        <!-- 生年月日入力 -->
                                        <select id="year" name="year" class="form-control form-control-sm" required>
                                            <option value="">---</option>
                                            <?php $years = array_reverse(range(today()->year - 100, today()->year)); ?>
                                            @foreach($years as $year)
                                            <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                        <label for="year" class="align-self-end px-2">年</label>

                                        <select id="month" name="month" class="form-control form-control-sm" required>
                                            <option value="">---</option>
                                            @foreach(range(1, 12) as $month)
                                            <option value="{{ $month }}" {{ old('month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                        <label for="month" class="align-self-end px-2">月</label>

                                        <select id="day" name="day" class="form-control form-control-sm" data-old-value="{{ old('day') }}" required></select>
                                        <label for="day" class="align-self-end px-2">日</label>
                                        <!-- 生年月日入力 -->

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">電話番号</th>
                                    <td><input type="text" name="phone" class=" form-control form-control-sm" placeholder="" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">身分証</th>
                                    <td>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-inline" type="radio" name="category_id" id="category1" value="1"  >
                                            <label class="form-check-label" for="category1">免許証</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-inline" type="radio" name="category_id" id="category2" value="2" >
                                            <label class="form-check-label" for="category2">保険証</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-inline" type="radio" name="category_id" id="category3" value="3" >
                                            <label class="form-check-label" for="category3">その他</label>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">身分証アップロード</th>
                                    <td>
                                        <input type="file" name="identity" accept="image/jpeg, image/png" class="form-control-file" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="overflow-auto border p-4 mx-auto rounded" style="height:200px; font-size: 90%;">
                            <h4 class="text-center pb-2">契約条項</h4>
                            <p>依頼者（以下「甲」という）は株式会社ORRES（以下「乙」という）に対し、動産物（別紙見積記載）に関する一切を委任し下記の通り契約を締結する。</p>

                            <ol>
                                <li>甲は乙に対し、別紙見積書に定める作業を依頼し乙はこれを請負うものとする。</li>
                                <li>甲は本契約対象動産物の所有者であることを表明保証します。</li>
                                <li>甲は同産物の所有権を乙に移譲し作業後の返還請求はできないものとする。また処理方法についても乙に対し意義申し立てしないことを表明する。</li>
                                <li>乙はリサイクル・リユースを目的とした動産物の買取を業としているため、当社が再利用できないと判断した場合、取引をお断りすることがある。</li>
                                <li>乙は再資源化または再利用の際に出た残渣については法にしたがって適正に処分いたします。</li>
                                <li>甲乙ともに本契約で知り得た相手方の情報を第三者に漏らしてはならないものとする。</li>
                                <li>乙はやむを得ない事由があるときは、甲の了解を得て、一時作業を停止することができるものとします。</li>
                                <li>甲は、本契約代金を動産物引き渡し完了時に支払うものとする。但し甲乙同意のもとでその他取り決めがある場合はこの限りではない。</li>
                                <li>本契約締結後、甲の都合による契約解除については乙が作業着手前に限りキャンセル料（違約金）を支払うことで解約できるものとします。
                                （作業期日の前日迄　契約金額の15％　当日　契約金額の30％）</li>
                            </ol>

                            <h5>買取同意事項</h5>
                            <ol>
                                <li>甲は乙に対し、別紙見積書の定める買取対象商品を移譲し、乙は買取代金を支払うものとする。</li>
                                <li>甲は本人確認の証として、買取品の引取地住所が記載されている身分証明書を提示し、買取品が窃盗品でないことを表明保証します。</li>
                                <li>甲は乙に対し、買取成立後返却請求はしないことを約束します。</li>
                                <li>乙は買取商品の代金を作業契約代金と相殺することができるものとします。</li>
                            </ol>
                        </div>

                        <div class="text-center py-3">
                            <input type="checkbox" id="horns" name="horns" required>
                            <label for="horns">契約条項に同意する</label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-5">送信</button>
                        </div>

                    {{ Form::close() }}
                </div>

            </div>
        </div><!-- card -->

    </div>
</main>

<script>
// 誕生日 日付の取得
function setDay() {
  // 年の値を取得
  const yearVal = document.getElementById('year').value;
  // 月の値を取得
  const monthVal = document.getElementById('month').value;
  // 日のセレクトボックスに挿入するHTML
  let html = '<option value="">---</option>';
  // 年月が有効な値の場合のみ日付の選択肢を加える
  if (yearVal !== '' && monthVal !== '') {
    // 特定の年月の最後の日付を取得する
    const lastDay = (new Date(yearVal, monthVal, 0)).getDate();
    // optionを組み立てる
    for (let day = 1; day <= lastDay; day++) {
      html += '<option value="' + day + '">' + day + '</option>';
    }
  }
  document.getElementById('day').innerHTML = html;
};

window.onload = function () {
  setDay();
  document.getElementById('year').addEventListener('change', setDay);
  document.getElementById('month').addEventListener('change', setDay);

  // リダイレクトした場合に元の入力値を復元する
  const dayElem = document.getElementById('day');
  dayElem.value = dayElem.getAttribute('data-old-value');
}
</script>



@endsection
