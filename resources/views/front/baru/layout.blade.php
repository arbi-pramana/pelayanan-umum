@extends('front.baru.master')
@section('content')
<div class="container">
    <div class="gap"></div>
    <h1 class="text-center mb20">Ruangan Kami</h1>
    <div class="row row-wrap">
        @php
        $ruang = App\Models\Ruang::get();
        @endphp
        @foreach($ruang as $i => $ruangan)
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <a class="hover-img" href="#">
                        <img src="{{asset($ruangan->foto_ruang)}}" alt="Image Alternative text"
                            title="{{$ruangan->nama_ruang}}" />
                    </a>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">{{$ruangan->nama_ruang}}</a></h5>
                    <p class="mb0"><small>{{$ruangan->deskripsi}}</small>
                    </p>
                    <p class="mb0 text-darken"><span
                            class="text-lg lh1em text-color">{{$ruangan->kapasitas}}</span><small> orang/ruangan</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="gap gap-small"></div>
</div>
<div class="container">
    <div class="gap"></div>
    <h1 class="text-center mb20">Layout Kami</h1>
    <div class="row row-wrap">
        @php
        $layoutruang = App\Models\LayoutRuang::get();
        @endphp
        @foreach($layoutruang as $i => $layoutruangan)
        <div class="col-md-4">
            <div class="thumb">
                <header class="thumb-header">
                    <a class="hover-img" href="#">
                        <img src="{{asset($layoutruangan->foto)}}" alt="Image Alternative text"
                            title="{{$layoutruangan->nama_layout_ruang}}" />
                    </a>
                </header>
                <div class="thumb-caption">
                    <h5 class="thumb-title"><a class="text-darken" href="#">{{$layoutruangan->nama_layout_ruang}}</a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="gap gap-small"></div>
</div>
@endsection