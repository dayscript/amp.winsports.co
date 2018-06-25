@extends('layouts.amp')

@section('title', 'Page Title')

@section('content')
  <article>
    <div class="medium-12">
      <span class="medium-8 text-right">{{ Carbon\Carbon::createFromTimestamp($content->changed,'America/Bogota')->toDayDateTimeString() }}</span>
    </div>

    <h1>{{$content->title}}</h1>

    @if( isset($content->field_lead->und[0]->value))
      <em> {{ $content->field_lead->und[0]->value }} </em>
    @endif


    <div class="medium-12">
      <div class="medium-4">
      </div>
      <div class="medium-8 social">
        <amp-social-share type="twitter" width="30" height="30"></amp-social-share>
        <amp-social-share type="facebook" width="30" height="30"
          data-param-app_id='941902379280971'
        ></amp-social-share>
        <amp-social-share type="gplus" width="30" height="30"></amp-social-share>
      </div>
    </div>

    @if( isset($content->field_codigo_mediastream->und[0]) )
      <amp-img src="{{$content->field_image->und[0]->realpath}}"
        width="450"
        height="300"
        layout="responsive"
        alt="winsports">
      </amp-img>
    @endif

    @if( isset($content->body->und[0]->value ) )
      <div>
        {!!$content->body->und[0]->value!!}
      </div>
    @endif
  </article>
@endsection
