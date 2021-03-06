<?php

namespace App\Http\Controllers;

use AWS;
use App\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lullabot\AMP\AMP;
use Lullabot\AMP\Validate\Scope;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $node_bucket = 'winsports-new';
      $node = '10';
      $s3 = AWS::createClient('s3');
      $file = $s3->getObject( ['Bucket' => $node_bucket, 'Key' => vsprintf('nodes/%d.json',$node) ] );
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', $file['@metadata']['effectiveUri']);

      dd(json_decode($res->getBody()));
      return view('news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpForCategory($type, $category, $title)
    {
      $amp = new AMP();

      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      $content = json_decode($article->content);

      $assetType = self::assetType($content);

      if(isset($content->body->und[0]->value)){
        $content->body->und[0]->value = self::getPropertiesImg($content->body->und[0]->value);
        $amp->loadHtml($content->body->und[0]->value);
        $content->body->und[0]->value = $amp->convertToAmpHtml();
      }
      // retrun json for describe object
      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('article', compact('article','content','assetType') );

    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmp($type, $title)
    {
      $amp = new AMP();

      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);
      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();


      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      if(isset($content->body->und[0]->value)){
        $content->body->und[0]->value = self::getPropertiesImg($content->body->und[0]->value);
        $amp->loadHtml($content->body->und[0]->value);
        $content->body->und[0]->value = $amp->convertToAmpHtml();
      }

      return view('article', compact('article','content','assetType') );
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpMultimediaNonCategory($type, $title){
      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('multimedia', compact('article','content','assetType') );
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpMultimedia($type, $category, $title){
      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('multimedia', compact('article','content','assetType') );
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpGalleryMultimediaNonCategory($type, $title){
      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('gallery-non-category', compact('article','content','assetType') );
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpGalleryGoalsMultimedia($type, $title){
      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('goals', compact('article','content','assetType') );
    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmpGallery($type, $category, $title){
      $re = '/[0-9]+\s*$/';
      $extract_nid = preg_match($re, $title, $nid, PREG_OFFSET_CAPTURE, 0);

      if(!$extract_nid){
        return view('not-found');
      }

      $nid = $nid[0][0];
      $article = Article::where('nid',$nid)->first();

      if( !$article ){
          $amazon_data = self::getAwsItem($nid);
          $article = new Article();
          $article->nid = $amazon_data->nid;
          $article->type = $amazon_data->type;
          $article->path = $amazon_data->path;
          $article->content = json_encode($amazon_data);
          $article->save();
      }
      $content = json_decode($article->content);
      $assetType = self::assetType($content);

      if( isset($_GET['json']) ){
          return response()->json($content);
      }

      return view('gallery', compact('article','content','assetType') );
    }

    /**
     * GET the specified resource for Amazon S3
     *
     * @param  $nid
     * @return Object $stdClass
     */

    function getAwsItem($nid){
      $node_bucket = 'winsports-new';
      $s3 = AWS::createClient('s3');
      $file = $s3->getObject( ['Bucket' => $node_bucket, 'Key' => vsprintf('nodes/%d.json',$nid) ] );
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', $file['@metadata']['effectiveUri']);
      return json_decode($res->getBody());
    }

    /**
     * Return asset type 'Mediastream, Yotube, JWPlayer'
     *
     * @param  $content (Object)
     * @return $type String
     */

    function assetType($content){
      $content = self::pathSecure($content);
      if(isset($content->field_codigo_mediastream->und[0]->value)){
        return 'mediastream';
      }
      if( isset($content->field_url->und[0]->value) ){
        if( strpos($content->field_url->und[0]->value, 'https://youtu.be') !== false || 
            strpos($content->field_url->und[0]->value, 'https://www.youtube.com') !== false ){
          return 'youtube';
        }elseif( strpos($content->field_url->und[0]->value, 'player.vimeo.com') !== false ){
            return 'vimeo';
        }elseif( strpos($content->field_url->und[0]->value, 'facebook') == false ){
            return 'jwplayer';
        }
      }
    }

    /**
     * Return Path Secure HTTPS
     *
     * @param  $content (Object)
     * @return $type Object
     */

    function pathSecure($content){
      if( isset($content->field_url->und[0]->value) ){
        $content->field_url->und[0]->value = str_replace('http://','https://',$content->field_url->und[0]->value);
        $content->field_url->und[0]->value = str_replace('http://','https://',$content->field_url->und[0]->value);
      }
      if( isset($content->field_url->und[0]->safe_value) ){
        $content->field_url->und[0]->safe_value = str_replace('http://','https://',$content->field_url->und[0]->safe_value);
        $content->field_url->und[0]->safe_value = str_replace('http://','https://',$content->field_url->und[0]->safe_value);
      }
      return $content;
    }

    /**
     * Return asset type 'Mediastream, Yotube, JWPlayer'
     *
     * @param  $content (Object)
     * @return $type String
     */

    public static function getMediaId($string){
      if(strpos($string,'https://youtu.be/') !== false ){
        return substr(parse_url($string,PHP_URL_PATH),1);
      }
      if(strpos($string,'https://www.youtube.com/watch') !== false){
        parse_str(parse_url($string,PHP_URL_QUERY), $output);
        return $output['v'];
      }
      if(strpos($string,'https://www.youtube.com/embed/') !== false){ 
        $output = substr($string, 30);  
        return $output;   
      }
    }

    public static function getThumbnail($string){
      return 'https://i.ytimg.com/vi/'. self::getMediaId($string) .'/hqdefault.jpg';
    }

    /**
     * Return asset type 'Properties Img Amp'
     *
     * @param  $content String
     * @return $type String
     */

    public static function getPropertiesImg($content){
      preg_match_all('/<(img)[^>](?:(style|src|alt)="(.*?)")[^>]*>/is', $content, $matches);
      $imgs = $matches[0];

      if($imgs && $imgs > 0) {
        foreach ($imgs as $key => $img) {
          preg_match('@src="([^"]+)"@', $img, $array); $src = array_pop($array);
          preg_match('@alt="([^"]+)"@', $img, $array); $alt = array_pop($array);
          preg_match('@style="([^"]+)"@', $img, $array); $style = array_pop($array);
          // preg_match('@width:([^;]+)px;@', $style, $array); $width = array_pop($array);
          // preg_match('@height:([^;]+)px;@', $style, $array); $height = array_pop($array);
          $img_amp = '<amp-img alt="'.$alt.'"  src="'.$src.'" width="320" height="210"></amp-img>';

          $content = str_replace($img, $img_amp, $content);
        }
      }     
      return $content; 
    }

}
