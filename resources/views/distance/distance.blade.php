<div class="row">
    <!-- CSRF保護 -->
    @csrf

    <div class="col-md-6">
        <label class="control-label" for="name">出発地：</label>

        <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        <?php if($url == "/appointment/create/schedule"){ ?>
        <input type="number" id="from_zipcode" name="from_zipcode" class="form-control input-md"  value="" readonly>
        <?php }else{ ?>
        <input type="number" id="from_zipcode" name="from_zipcode" class="form-control input-md"  value="{{ $postal_code }}" required>
        <?php } ?>

    </div>
    <div class="col-md-6">
        <label class="control-label" for="name">目的地：</label>
        <input type="number" id="to_zipcode" name="to_zipcode" class="form-control input-md" value="" required>
    </div>
    <div class="col-md-12 text-center my-3" id="result">
        <input class="btn btn-success" type="button" id="calc_distance" value="所要時間計算"/>
    </div>

    <div class="col-md-12" style="display: table;">
        <span style="display: table-cell; vertical-align: middle; text-align: right;" class="pr-2">車で約</span>

        <span style="display: table-cell; vertical-align: middle; width: 100px; height: 40px; background: #E9ECEF; border: 1px solid #ced4da;" class="font-weight-bold rounded text-center" id="result-comment">
        </span>

        <span style="display: table-cell; vertical-align: middle; text-align: left;" class="pl-2">です。</span>
    </div>

</div>

<script>
    $(function () {
        $("[id^=calc_distance]").on("click", function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/distance/calc',
                type: 'POST',
                data: {
                    'from_zipcode': $('#from_zipcode').val(),
                    'to_zipcode': $('#to_zipcode').val(),
                    '_token': $('#_token').val()
                }
            })
                // Ajaxリクエスト成功時の処理
                .done(function (data) {
                    //if (data == "no") {
                    //    $('#result-comment').html('車で約<input type="number" value="'+data+'" disabled>');
                    //} else {
                        //$('#result-comment').html('取得できませんでした'+data+'');
                        $('#result-comment').html(''+data+'');
                    //}
                })
                // Ajaxリクエスト失敗時の処理
                .fail(function (data) {
                    $('#result-comment').text(data);
                });

        });
    });
</script>
