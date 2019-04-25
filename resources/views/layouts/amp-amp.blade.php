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
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
      <link rel="shortcut icon" href="https://www.winsports.co/assets/img/icon/winsports.ico" type="image/ico" rel="icon">
      <title>{{$content->title}} | Win Sports</title>
      <style amp-custom>
        body {
          width: auto;
          margin: 0;
          padding: 0;
          font-family: "Open Sans", sans-serif;
          font-weight: 400;
          line-height: 1.5;
          color: #666;
        }
        body a {
          color: #009bce;
          text-decoration: none;
        }
        body a:hover {
          color: #009bce;
        }
        header {
          background: #1e4d62;
          color: white;
          text-align: center;
          margin: 0 0 40px 0;
        }
        amp-img {
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
        em {
          margin: 19px 0;
          display: inline-block;
          font-size: 14px;
        }
        .autor {
          color: #004d62;
          font-size: .85em;
          font-weight: 700;
        }
        .logo-icon {
          display: inline-block;
          width: 40%;
          text-align: left;
          float: left;
        }
        li {
          text-align: right;
          list-style: none;
          padding-right: 10px;
        }
        li a {
          color: #004d62;
          font-size: 13px;
          font-weight: 600;
          padding: 9px 0px;
          display: inline-block;
          text-transform: uppercase;
        }
        .container {
          padding: 20px 10px 10px 10px;
        }
        .sidebar {
          background: #1e4d62;
          display: inline-block;
          width: 100%;
        }
        .main-footer {
          background: #1e4d62;
          padding: 5px 30px;
          color: #fff;
        }
        .main-footer a {
          color: #fff;
          display: inline-block;
          width: 100%;
          text-decoration: none;
          font-size: 13px;
        }
        .sub-footer {
          background: #133847;
          padding: 10px;
          font-size: 13px;
        }
        .sub-footer span {
          text-align: center;
          display: inline-block;
          width: 100%;
          color: #fff;
        }
        .sub-footer span a {
          color: #ed5106;
        }
        .text-left {
          text-align: left;
        }
        .text-right {
          text-align: right;
        }
        .text-category {
          color: #ed5106;
        }
        .uppercase {
          text-transform: uppercase;
        }
        .medium-12 {
          display: inline-block;
          width: 100%;
        }
        .medium-6 {
          display: inline-block;
          width: 50%;
          float: left;
        }
        .medium-4 {
          display: inline-block;
          width: 30%;
          float: left;
        }
        .medium-8 {
          display: inline-block;
          width: 70%;
          float: left;
        }
        .social {
          text-align: right;
        }
        amp-social-share {
          width: 30px;
          height: 30px;
        }
        @font-face {
          font-family: 'ptsans-narrow';
          src: url('/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.eot');
          src: local('☺'), url('/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.woff') format('woff'), url('/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.ttf') format('truetype'), url('/assets/assets/fonts/ptsans-narrow-bold/PTSans-Narrow-Bold.svg') format('svg');
          font-weight: normal;
          font-style: normal;
        }
        h1, h2, h3, h4, h5, h6 {
          font-family: ptsans-narrow;
          font-weight: 400;
          font-style: normal;
          color: #004d62;
          margin-top: 0;
          line-height: 1;
          padding: 0;
        }
        h1 {
          font-size: 28px;
        }
        amp-sidebar {
          position: relative;
          width: 151px;
          margin: 0;
          float: right;
          right: 30px;
          background: #183e4e;
        }
        .box-shadow-menu {
          font-size: 40px;
          background: #1e4d62;
          border: none;
          top: 13px;
          position: absolute;
          right: 63px;
        }
        .box-shadow-menu:before {
          content: "";
          position: absolute;
          top: 30px;
          width: 1em;
          height: 0.15em;
          background: white;
          box-shadow: 0 0.25em 0 0 white, 0 0.5em 0 0 white;
        }
        section h4.box-shadow-menu {
          background: #1e4d62;
          color: #fff;
          padding: 0 0 0 16px;
          line-height: 43px;
          border: none;
        }
        .accordion-header {
          cursor: pointer;
          background-color: #1e4d62;
          padding-right: 0;
          border: 1px solid #1e4d62;
          color: #fff;
          font-size: 40px;
          text-align: right;
          margin: 0;
          padding-left: 48px;
          line-height: 47px;
          text-transform: uppercase;
        }
        table,
        td {
          border: 1px solid;
        }
        td {
          border-bottom: 1px solid;
          border-top: 0;
          border-left: 0;
          border-right: 0;
          font-size: 11px;
        }
      </style>
      @yield('meta_data')
      <style amp-boilerplate>
         body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes   -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
      </style>
      <noscript>
         <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
         </style>
      </noscript>
      <link rel="canonical" href="https://www.winsports.co{{$article->path}}">
      <script async src="https://cdn.ampproject.org/v0.js"></script>
      <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
      <script async custom-element="amp-jwplayer" src="https://cdn.ampproject.org/v0/amp-jwplayer-0.1.js"></script>
      <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
      <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
      <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
      <script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
      <script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
      <script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>
      <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
      <script async custom-element="amp-dailymotion" src="https://cdn.ampproject.org/v0/amp-dailymotion-0.1.js"></script>
      <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
      <script async custom-element="amp-vimeo" src="https://cdn.ampproject.org/v0/amp-vimeo-0.1.js"></script>
   </head>
   <body>
      @section('sidebar')
      <header>
         <div class="container sidebar">
            <div class="logo-icon">
               <a href="http://www.winsports.co">
                  <amp-img src="//www.winsports.co/assets/img/win/winsports_2017.png"
                     alt="Winsports"
                     width='90'
                     height='48'>
               </a>
            </div>
            <button on="tap:sidebar.open" class="ampstart-btn caps m2 box-shadow-menu"></button>
         </div>
      </header>
      <amp-sidebar id="sidebar" layout="nodisplay" side="right">
         <ul>
            <li class="home"><a href="http://www.winsports.co">Inicio</a></li>
            <li><a href="http://www.winsports.co/liga-aguila/multimedia/galeria-goles">Goles</a></li>
            <li><a href="http://www.winsports.co/wincast">Wincast</a></li>
            <li><a href="http://www.winsports.co/concursos">Concursos</a></li>
            <li><a href="http://www.winsports.co/futbol-colombiano/multimedia/videos">Videos</a></li>
            <li><a href="http://www.winsports.co/programas">Programas</a></li>
            <li><a href="http://www.winsports.co/futbol-colombiano">Fútbol Colombiano</a></li>
            <li><a href="http://www.winsports.co/seleccion-colombia">Selección Colombia</a></li>
            <li><a href="http://www.winsports.co/futbol-internacional">Fútbol Internacional</a></li>
            <li><a href="http://www.winsports.co/otros-deportes">Otros deportes</a></li>
            <li><a href="http://www.winsports.co/programacion">Partidos X TV</a></li>
         </ul>
      </amp-sidebar>
      <amp-analytics type="googleanalytics">
         <script type="application/json">
            {
              "vars": {
                "account": "UA-37954209-1"
              },
              "triggers": {
                "trackPageview": {
                  "on": "visible",
                  "request": "pageview"
                }
              }
            }
         </script>
      </amp-analytics>
      @show
      <div class="container">
         @yield('content')
      </div>
      <footer>
         <div class="main-footer">
            <a href="https://www.winsports.co/terminos-condiciones">Términos y Condiciones</a>
            <a href="https://winsports.zendesk.com/hc/es/requests/new">Soporte Técnico Win Sports Online</a>
            <a href="https://www.winsports.co/cableoperadores">Cableoperadores</a>
         </div>
         <div class="sub-footer">
            <span>
            Copyright 2018, Bogotá - Colombia<br>
            <a href="https://www.winsports.co/">winsports.co</a>
            </span>
         </div>
      </footer>
   </body>
</html>
