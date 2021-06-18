@extends('layouts.app')



@section('style')


<style>


.popup {

    width:100%;
    height:100%;
    padding:16px;
    z-index:2;
    position:absolute;
    display:block;
    transition: opacity 1s ease-in-out;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition:opacity 1s ease-in-out;

}

.popupContent {
    padding: 6px;
    background: white;
    border-radius: 6px;
    text-align: center;
    min-height:295px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

</style>

@endsection


@section('content')
<div class="d-flex flex-column-fluid mb-10">

    @if ( session('message') && session('where') === 'support' )
    <!-- By Blaxk  -->
    <div class="popup"  >
                <div class="popupContent" >
                    <h1 style="margin: 7% 0 ">{{ __(session('message'))}} </h1>
                    <canvas class='Tick'></canvas>
                </div>
                
    </div>

    <script>
 
 
    </script>
    @endif

    <div class="container-fluid">
        <div class="row m-0 statsitcs-container">
            @include('supplier.home.components.products_count')
            <div class="col-sm-1"></div>
            @include('supplier.home.components.orders_count')
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
               // hide popup 



        //Hide Popup
        setTimeout(() => {
            var start = 100;
        var mid = 145;
        var end = 250;
        var width = 20;
        var leftX = start;
        var leftY = start;
        var rightX = mid - (width / 2.7);
        var rightY = mid + (width / 2.7);
        var animationSpeed = 20;

        var ctx = document.getElementsByClassName('Tick')[0].getContext('2d');
        ctx.lineWidth = width;
        ctx.strokeStyle = 'rgba(0, 150, 0, 1)';

        for (i = start; i < mid; i++) {
        var drawLeft = window.setTimeout(function() {
            ctx.beginPath();
            ctx.moveTo(start, start);
            ctx.lineTo(leftX, leftY);
            ctx.stroke();
            leftX++;
            leftY++;
        }, 1 + (i * animationSpeed) / 3);
        }

        for (i = mid; i < end; i++) {
        var drawRight = window.setTimeout(function() {
            ctx.beginPath();
            ctx.moveTo(leftX, leftY);
            ctx.lineTo(rightX, rightY);
            ctx.stroke();
            rightX++;
            rightY--;
        }, 1 + (i * animationSpeed) / 3);
        }
        
            var popup =document.getElementsByClassName('popup');
  
            // popup[0].style.display = 'none';
            popup[0].style.opacity = '0';

 
        }, 3000);
    </script>
@endsection
