@extends('layouts.amp')

@section('title', 'Page Title')

@section('content')
  <article>
    <div class="medium-12">
      <span class="medium-4 text-left text-category uppercase">{{ $content->field_categoria->und[0]->name }}</span>
      <span class="medium-8 text-right">{{ Carbon\Carbon::createFromTimestamp($content->changed,'America/Bogota')->toDayDateTimeString() }}</span>
    </div>

    <h1>{{$content->title}}</h1>
    <em> {{ $content->field_lead->und[0]->value}} </em>
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


    @if( isset($content->field_is_video_article->und[0]->value ) && isset( $content->field_id_jwplayer->und[0]->value)  )
      <amp-jwplayer
        data-player-id="Oy6uifW8"
        data-media-id="{{$content->field_id_jwplayer->und[0]->value}}"
        layout="responsive"
        width="16" height="9">
      </amp-jwplayer>
    @endif

    @if( isset($content->field_image->und[0]->realpath) && !isset($content->field_is_video_article->und[0]->value ) )
      <amp-img alt="A view of the sea"
        src="{{$content->field_image->und[0]->realpath}}"
        width="{{$content->field_image->und[0]->width}}"
        height="{{$content->field_image->und[0]->height}}"
        layout="responsive">
      </amp-img>
    @endif
    <div>
      {!!$content->body->und[0]->value!!}
    </div>

  </article>
@endsection
