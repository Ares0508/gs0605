@extends('layouts.app')

@section('content')

<main class="page-content">
    <div class="container">
        @csrf
        <div class="card-outline-success">
            <div class="card-outline-success-header">
                <span>ご署名を記入してください</span>
            </div>
            <div class="card-body">

                <div class="canvas_container" style="width: 100%;">
                    <canvas id="drawcanvas" class="rounded" width="400px" height="200px" style="border:1px solid #888;"></canvas>
                </div>


                <input type="button" class="btn btn-outline-secondary" id="clearCanvas" value="クリア" data-inline="true" />
                <a id="download" href="#" download="canvas.jpg">
                    <!--<button type="button" class="btn btn-primary">ダウンロード</button>-->
                </a>
                <div id="result"><img src=""></div>

                <div class="d-flex justify-content-between">
                    <p class="text-muted">この署名が法的な効力を持つことに同意します</p>

                    <button type="button" id="accept" class="btn btn-success text-center px-4">
                        <span>適用</span>
                    </button>
                </div>


            </div>
        </div>

        <button onclick="location.href=''" type="button" class="btn btn-secondary text-center mt-3">
            <span>確認画面へ戻る</span>
        </button>

    </div>
</main>

<script>
var w = $('.canvas_container').width();
var h = $('.canvas_container').height();
$('#drawcanvas').attr('width', w);
$('#drawcanvas').attr('height', h);
</script>


<script>
  var mamDraw=[];
  mamDraw.isMouseDown=false;
  mamDraw.position=[];
  mamDraw.position.x=0;
  mamDraw.position.y=0;
  mamDraw.position.px=0;
  mamDraw.position.py=0;

  window.addEventListener("load",function(){
    //初期設定
    mamDraw.canvas=document.getElementById("drawcanvas");
    mamDraw.canvas.addEventListener("touchstart",onDown);
    mamDraw.canvas.addEventListener("touchmove",onMove);
    mamDraw.canvas.addEventListener("touchend",onUp);
    mamDraw.canvas.addEventListener("mousedown",onMouseDown);
    mamDraw.canvas.addEventListener("mousemove",onMouseMove);
    mamDraw.canvas.addEventListener("mouseup",onMouseUp);
    window.addEventListener("mousemove",StopShake);
    mamDraw.context=mamDraw.canvas.getContext("2d");
    mamDraw.context.strokeStyle="#000000";
    mamDraw.context.lineWidth=5;
    mamDraw.context.lineJoin="round";
    mamDraw.context.lineCap="round";
    document.getElementById("clearCanvas").addEventListener("click",clearCanvas);
  });
  function StopShake(event){
    mamDraw.isMouseDown=false;
    event.stopPropagation();
  }
  function onDown(event){
    mamDraw.isMouseDown=true;
    mamDraw.position.px=event.touches[0].pageX-event.target.getBoundingClientRect().left-mamGetScrollPosition().x;
    mamDraw.position.py=event.touches[0].pageY-event.target.getBoundingClientRect().top -mamGetScrollPosition().y;
    mamDraw.position.x=mamDraw.position.px;
    mamDraw.position.y=mamDraw.position.py;
    drawLine();
    event.preventDefault();
    event.stopPropagation();
  }
  function onMove(event){
    if(mamDraw.isMouseDown){
      mamDraw.position.x=event.touches[0].pageX-event.target.getBoundingClientRect().left-mamGetScrollPosition().x;
      mamDraw.position.y=event.touches[0].pageY-event.target.getBoundingClientRect().top -mamGetScrollPosition().y;
      drawLine();
      mamDraw.position.px=mamDraw.position.x;
      mamDraw.position.py=mamDraw.position.y;
      event.stopPropagation();
    }
  }
  function onUp(event){
    mamDraw.isMouseDown=false;
    event.stopPropagation();
  }
  function onMouseDown(event){
    mamDraw.position.px=event.clientX-event.target.getBoundingClientRect().left;
    mamDraw.position.py=event.clientY-event.target.getBoundingClientRect().top ;
    mamDraw.position.x=mamDraw.position.px;
    mamDraw.position.y=mamDraw.position.py;
    drawLine();
    mamDraw.isMouseDown=true;
    event.stopPropagation();
  }
  function onMouseMove(event){
    if(mamDraw.isMouseDown){
      mamDraw.position.x=event.clientX-event.target.getBoundingClientRect().left;
      mamDraw.position.y=event.clientY-event.target.getBoundingClientRect().top ;
      drawLine();
      mamDraw.position.px=mamDraw.position.x;
      mamDraw.position.py=mamDraw.position.y;
      event.stopPropagation();
    }
  }
  function onMouseUp(event){
    mamDraw.isMouseDown=false;
    event.stopPropagation();
  }
  function drawLine(){
    mamDraw.context.strokeStyle="#000000";
    mamDraw.context.lineWidth=3;
    mamDraw.context.lineJoin="round";
    mamDraw.context.lineCap="round";
    mamDraw.context.beginPath();
    mamDraw.context.moveTo(mamDraw.position.px,mamDraw.position.py);
    mamDraw.context.lineTo(mamDraw.position.x,mamDraw.position.y);
    mamDraw.context.stroke();
  }
  function clearCanvas(){
    mamDraw.context.fillStyle="rgb(255,255,255)";
    mamDraw.context.fillRect(
      0,0,
      mamDraw.canvas.getBoundingClientRect().width,
      mamDraw.canvas.getBoundingClientRect().height
    );
  }
  function mamGetScrollPosition() {
    return {
      "x":document.documentElement.scrollLeft || document.body.scrollLeft,
      "y":document.documentElement.scrollTop  || document.body.scrollTop
    };
  }

// canvasを画像で保存
    $("#download").click(function(){
      canvas = document.getElementById('drawcanvas');
      var base64 = canvas.toDataURL("image/png");
      document.getElementById("download").href = base64;
    });
    $('#accept').click(function() {
        canvas = document.getElementById('drawcanvas');
        var base64 = canvas.toDataURL("image/png");
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/result',
                type: 'POST',
                data: {
                    'target': 'done',
                    'key': 'signature',
                    '_token': $('input[name=_token]').val(),
                    'signature': base64
                }
            })
            .done(function (data) {
                location.href = "/result/done";
            })
            .fail(function (data) {

            });
    })

</script>

@endsection
