@extends('client.layout.master')
@section('content')
<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span></span></h3>
		<div class="product-group">
			<div class="row">
                @foreach($products as $item)
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="{{ asset('image/'.$item->image) }}" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">{{ $item->name }}</h5>
					    <p class="card-text">{{ $item->price }}</p>
					    <a href="{{ route('page.detail',$item->id) }}" class="btn btn-primary">Details</a>
					  </div>
                      <audio controls controlsList="nodownload" style="width: 180px;" ontimeupdate="myAudio(this)">
                        <source src="{{ asset('audio/'.$item->audio) }}" type="audio/mpeg">
                        </audio>
                        <script type="text/javascript">
                            function myAudio(event){
                                if(event.currentTime>10){
                                    event.currentTime=0;
                                    event.pause();
                                    alert("Bạn phải trả phí để nghe cả bài")
                                }
                            }
                        </script>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>


</div>
@endsection
