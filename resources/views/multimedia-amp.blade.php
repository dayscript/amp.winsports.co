<?php use App\Http\Controllers\ArticleController;?>

@extends('layouts.amp')

@section('title', 'Page Title')

@section('meta_data') 
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": "{{isset($content->path) ? "https://www.winsports.co".$content->path : ""}}"
      },
      "headline": "{{isset($content->title) ? $content->title : ""}}",
      "datePublished": "{{isset($content->created) ? Carbon\Carbon::parse( Carbon\Carbon::createFromTimestamp($content->created,'America/Bogota')->toDayDateTimeString() )->format('Y-m-d H:i:s') : ""}}",
      "dateModified": "{{isset($content->changed) ? Carbon\Carbon::parse( Carbon\Carbon::createFromTimestamp($content->changed,'America/Bogota')->toDayDateTimeString() )->format('Y-m-d H:i:s') : ""}}",
      "description": "{{isset($content->field_lead->und[0]->value) ? $content->field_lead->und[0]->value : ""}}",
      "author": {
          "@type": "Organization",
          "name": "Win Sports",
          "description": "El canal oficial de la Liga y el Fútbol Profesional Colombiano. Encontrarás, además, la mejor información de Baloncesto, Futsal y Otros Deportes."
      },
      "publisher": {
          "@type": "Organization",
          "name": "Win Sports",
          "logo": {
              "@type": "ImageObject",
              "url": "https://www.winsports.co/logo-win-micro_2017.png",
              "width": 113,
              "height": 60
          }
      },
      "image": {
        "@type": "ImageObject",
        "url": "{{isset($content->field_image->und[0]->realpath) ? $content->field_image->und[0]->realpath : ""}}",
        "height": 240,
        "width": 320
      }
    }
  </script>
@endsection

@section('content') 
  <article>
    <div class="medium-12">
      <span class="medium-4 text-left text-category uppercase">{{$content->field_categoria->und[0]->name}}</span>
      <span class="medium-8 text-right">{{Carbon\Carbon::createFromTimestamp($content->changed,'America/Bogota')->toDayDateTimeString()}}</span>
    </div>

    <h1>{{$content->title}}</h1>

    @if( isset($content->field_lead->und[0]->value))
      <em> {{$content->field_lead->und[0]->value}} </em>
    @endif


    <div class="medium-12">
      <div class="medium-4">
        <span class="autor" >Por: {{$content->field_fuente->und[0]->name}}</span>
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
        @case('jwplayer') {{-- JWPlayer --}}
          @if(isset($content->field_id_jwplayer->und[0]->value))
            <amp-jwplayer
              data-player-id="Oy6uifW8"
              data-media-id="{{$content->field_id_jwplayer->und[0]->value}}"
              layout="responsive"
              width="16" height="9">
            </amp-jwplayer>
          @endif
        @break
        @case('mediastream') {{-- Mediastream --}}
          @if(isset($content->field_codigo_mediastream->und[0]->value))
            <amp-iframe
              width="600"
              height="400"
              sandbox="allow-scripts allow-same-origin allow-presentation"
              layout="responsive"
              frameborder="0"
              src="https://mdstrm.com/embed/{{$content->field_codigo_mediastream->und[0]->value}}?jsapi=true&autoplay=false&mse=true">
              <amp-img layout="fill" src="{{$content->field_image->und[0]->realpath}}" placeholder></amp-img>
            </amp-iframe>
          @endif    
        @break
        @case('vimeo') {{-- Vimeo --}}
       
        @break
        @default
          @if(isset($content->field_url->und[0]->value) && ArticleController::getMediaId($content->field_url->und[0]->value))
            <amp-youtube
              data-videoid="{{ArticleController::getMediaId($content->field_url->und[0]->value)}}"
              layout="responsive"
              width="480" height="270">
            </amp-youtube>
          @endif
    @endswitch

    @if( isset($content->body->und[0]->value ) )
      <div>
        {!!$content->body->und[0]->value!!}
      </div>
    @endif
  </article>
@endsection
