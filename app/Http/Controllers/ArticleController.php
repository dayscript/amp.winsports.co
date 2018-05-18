<?php

namespace App\Http\Controllers;

use AWS;
use App\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


      return view('article', compact('article','content') );

    }

    /**
     * Show the specified resource for Google AMP.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showAmp($type, $title)
    {

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
      
      return view('article', compact('article','content') );
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
}
