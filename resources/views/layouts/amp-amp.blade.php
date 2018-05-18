<!--
 Copyright 2016 Google Inc.

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
-->

<!doctype html>
<html lang="es" ⚡>
  <head>
    <link rel="shortcut icon" href="amp_favicon.png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <title>App Name - @yield('title')</title>
    <style amp-custom>
      body {
        width: auto;
        margin: 0;
        padding: 0;
        font-family:  "Open Sans", sans-serif;
        font-weight: 400;
        line-height: 1.5;
        color: #666;
      }
      body a{
        color: #009bce;
        text-decoration: none;
      }
      body a:hover{
        color: #009bce;
      }
      header {
        background: Tomato;
        color: white;
        font-size: 2em;
        text-align: center;
        margin: 0 0 40px 0;
      }
      amp-img{
        margin: 15px 0px;
      }
      h1 {
        margin: 0;
        padding: 0.5em;
        background: white;

      }
      p {
        padding: 0.5em;
        margin: 0.5em;
      }
      em{
        margin: 19px 0;
        display: inline-block;
        font-size: 14px;
      }
      .autor{
        color: #004d62;
        font-size: .85em;
        font-weight: 700;
      }
      .logo-icon{
        display: inline-block;
        width: 100%;
        text-align: left;
      }
      .container{
        padding: 10px;
      }
      .sidebar{
        background: #1e4d62;
      }
      .container{
        padding: 10px;
      }
      .main-footer{
        background: #1e4d62;
        padding: 5px 30px;
        color:#fff;
      }
      .main-footer a{
        color:#fff;
        display: inline-block;
        width: 100%;
        text-decoration: none;
        font-size: 13px;
      }
      .sub-footer{
        background: #133847;
        padding: 10px;
        font-size: 13px;
      }
      .sub-footer span{
        text-align: center;
        display: inline-block;
        width: 100%;
        color:#fff;
      }
      .sub-footer span a{
        color:#ed5106;
      }
      .text-left{
        text-align: left;
      }
      .text-right{
        text-align: right;
      }
      .text-category{
        color:#ed5106;
      }
      .uppercase{
        text-transform: uppercase;
      }
      .medium-12{
        display: inline-block;
        width: 100%;
      }
      .medium-6{
        display: inline-block;
        width:50%;
        float: left;
      }
      .medium-4{
        display: inline-block;
        width: 30%;
        float: left;
      }
      .medium-8{
        display: inline-block;
        width:70%;
        float: left;
      }
      .social{
        text-align: right;
      }
      amp-social-share{
        width: 30px;
        height: 30px;
      }
      @font-face {
        font-family: 'ptsans-narrow';
        src: url('http://www.winsports.co/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.eot');
        src: local('☺'), url('http://www.winsports.co/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.woff') format('woff'), url('http://www.winsports.co/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.ttf') format('truetype'), url('http://www.winsports.co/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.svg') format('svg');
        font-weight: normal;
        font-style: normal;
      }
      h1,h2,h3,h4,h5,h6{
      font-family: ptsans-narrow;
      font-weight: 400;
      font-style: normal;
      color: #004d62;
      margin-top: 0;
      line-height: 1;
      padding: 0;
      }

      h1{
        font-size: 28px;
      }
    </style>
    <style amp-boilerplate>
      body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes   -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
    </style>

    <noscript>
      <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
      </style>
    </noscript>

    <link rel="canonical" href="{{$article->path}}">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    <script async custom-element="amp-jwplayer" src="https://cdn.ampproject.org/v0/amp-jwplayer-0.1.js"></script>
  </head>

  <body>
    @section('sidebar')
    <header>
      <div class="container sidebar">
        <div class="logo-icon">
          <a href="/">
            <img src="//www.winsports.co/assets/img/win/winsports_2017.png"
                 alt="Winsports"
                 id="logowin"
                 width='90px'>
          </a>
        </div>
      </div>
    </header>

    @show

   <div class="container">
       @yield('content')
   </div>

   <footer>
    <div class="main-footer">
        <a href="">Términos y Condiciones</a>
        <a href="">Soporte Técnico Wins Sports Online</a>
        <a href="">Cableoperadores</a>
    </div>
    <div class="sub-footer">
      <span><a href=""> Winsports.co</a> Copyright 2018, Bogotá - Colombia<span>
    </div>
   </footer>
  </body>
</html>
