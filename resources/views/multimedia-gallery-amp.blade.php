@extends('layouts.amp')

@section('title', 'Page Title')

@section('content')
  <article>
    <div class="medium-12">
      <span class="medium-4 text-left text-category uppercase">{{ $content->field_categoria->und[0]->name }}</span>
      <span class="medium-8 text-right">{{ Carbon\Carbon::createFromTimestamp($content->changed,'America/Bogota')->toDayDateTimeString() }}</span>
    </div>

    <h1>{{$content->title}}</h1>

    @if( isset($content->field_lead->und[0]->value))
      <em> {{ $content->field_lead->und[0]->value }} </em>
    @endif


    <div class="medium-12">
      <div class="medium-4">
        <span class="autor" >Por: {{ $content->field_fuente->und[0]->name }}</span>
      </div>
      <div class="medium-8 social">
        <amp-social-share type="twitter" width="30" height="30"></amp-social-share>
        <amp-social-share type="facebook" width="30" height="30"
          data-param-app_id='941902379280971'
        ></amp-social-share>
        <amp-social-share type="gplus" width="30" height="30"></amp-social-share>
      </div>
    </div>

    @if( $content->type == 'galeria_imagenes' )
    <amp-carousel id="carousel-with-preview"
        width="450"
        height="300"
        layout="responsive"
        type="slides">
        @foreach($content->field_image->und as $key => $image )
          <amp-img src="{{$image->realpath}}"
            width="450"
            height="300"
            layout="responsive"
            alt="{{$image->alt}}">
          </amp-img>
        @endforeach
    </amp-carousel>

    <div class="carousel-preview">
      @foreach($content->field_image->und as $key => $image )
      <button on="tap:carousel-with-preview.goToSlide(index=0)">
        <amp-img src="{{$image->realpath}}"
          width="60"
          height="40"
          alt="{{$image->alt}}">
        </amp-img>
      </button>
      @endforeach
    </div>
    @endif

    @if( isset($content->body->und[0]->value ) )
      <div>
        {!!$content->body->und[0]->value!!}
      </div>
    @endif
  </article>
@endsection
