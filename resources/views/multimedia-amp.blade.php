<?php use App\Http\Controllers\ArticleController;?>
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

    @switch($assetType)
        @case('jwplayer') {{-- JWPlayer id   --}}
        <amp-jwplayer
          data-player-id="Oy6uifW8"
          data-media-id="{{$content->field_id_jwplayer->und[0]->value}}"
          layout="responsive"
          width="16" height="9">
        </amp-jwplayer>
        @break

        @case('mediastream') {{-- Mediastream --}}
        <a href="http://www.winsports.co/{{$content->path}}">
          <amp-img alt="A view of the sea"
            src="{{$content->field_image->und[0]->realpath}}"
            width="{{$content->field_image->und[0]->width}}"
            height="{{$content->field_image->und[0]->height}}"
            layout="responsive">
          </amp-img>
        </a>
        {{-- <amp-nexxtv-player
          data-mediaid="{{$content->field_codigo_mediastream->und[0]->value}}"
          data-client="761"
          data-streamtype="video"
          data-seek-to="2"
          data-mode="static"
          data-origin="https://embed.nexx.cloud/"
          data-disable-ads="1"
          data-streaming-filter="nxp-bitrate-2500"
          layout="responsive"
          width="480" height="270">
        </amp-nexxtv-player> --}}
        @break
        @case('vimeo') {{-- Vimeo --}}
       
        @break
        @default
        <amp-youtube
          data-videoid="{{ArticleController::getMediaId($content->field_url->und[0]->value)}}"
          layout="responsive"
          width="480" height="270">
        </amp-youtube>
    @endswitch

    @if( isset($content->body->und[0]->value ) )
      <div>
        {!!$content->body->und[0]->value!!}
      </div>
    @endif
  </article>
@endsection
