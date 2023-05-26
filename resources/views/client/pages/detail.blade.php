@extends('client.layout.master')
@section('content')
<div class="container">
    <div class="row">

            <div class="col-md-6" style="text-align: left;">
                <h2> Name of Music: {{ $product->name }}</h2>
                <p>Price: {{ $product->price }} </p>
                <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px;">
                           <source src="{{ asset('audio/'.$product->audio) }}" type="audio/mpeg">
                       </audio>
                       <script type="text/javascript">
                           function MyAudio(event){
                               if(event.currentTime>30){
                                   event.currentTime=0;
                                   event.pause();
                                   alert("Bạn phải trả phí để nghe cả bài")
                               }
                           }
                       </script>
                       <h5> Singer:{{ $product->singer }}</h5>

                        <textarea cols="40" rows="10" disabled>{{ $product->description }}</textarea>

                      <a href="">  <button type="submit" name ="buy" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Add to cart</button> </a>

            </div>
            <!-- cho ảnh quay tròn-->
            <div class="images-detail">
            <div class="col-md-6">
                <img src="{{ asset('image/'.$product->image) }}" style = "width: 500px;height: 500px;">
            </div>
        </div>

    </div>
</div>
@endsection
