<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tinify\Source;
use Tinify\Tinify;

use Http;

class ImgController extends Controller
{
    //
    public function __construct() {
        $this->apikey = 'lPFBSgdVcGDmqykGY56jdx42QvvmY554';
        if(!$this->apikey) {
            throw new \InvalidArgumentException('Please set TINIFY_APIKEY environment variables.');
        }
        $this->client = new Tinify();
        $this->client->setKey($this->apikey);

    }
    public function setKey($key) {
        return $this->client->setKey($key);
    }

    public function setAppIdentifier($appIdentifier) {
        return $this->client->setAppIdentifier($appIdentifier);
    }

    public function getCompressionCount() {
        return $this->client->getCompressionCount();
    }

     public function compressionCount() {
        return $this->client->getCompressionCount();
    }

    public function fromFile($path) {
        return Source::fromFile($path);
    }




    public function SaveImg($request)
    {

        //get File
        $UplFile=$request;
        $name =  $UplFile->getClientOriginalName();
        $extension = $UplFile->getClientOriginalExtension();

        //Tinify
        $source= $this->fromFile($UplFile);
        $resized = $source->resize(array(
            "method" => "fit",
            "width" => 300,
            "height" => 300
        ));
        $re=$resized->toFile('storage/tmp/tini/uploaded.'.$extension);

        //generate unique random file name
        $name=md5(uniqid(rand(), true));

        $file= Storage::get('/public/tmp/tini/uploaded.'.$extension);

        //Send To WordPress
        $req=Http::withHeaders(['Content-Disposition'=>'form-data'])
        ->withBasicAuth('user','*u)I!j!hX)xBN2I3BBVgaSE$')
        ->attach('file',$file, ' '.$name.'.'.$extension)
        ->post('https://wordpress-608610-2061089.cloudwaysapps.com/wp-json/wp/v2/media');
        
        //response
        $status= $req->successful();
        if($status = 1 ){

            $res=$req->object();
            return $res;

        }
        else{
            return 'Image Erroe While Uploading';
        }
       
    }



}
