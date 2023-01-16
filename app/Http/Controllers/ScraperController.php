<?php

namespace App\Http\Controllers;

use Error;
use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function index()
    {
        $client = new Client();
        
        $website = $client->request('GET', 'https://www.businesslist.com.ng/category/interior-design/city:lagos');
        
        $companies = $website->filter('h4 > a')->each(function ($node) {
            dump($node->text());
        });

        return $website->html();
    }

    private $results = array();

    public function scraper()
    {
        $client = new Client();
        $url = 'https://www.worldometers.info/coronavirus/';
        $page = $client->request('GET',$url);

        // echo "<pre>";
        // print_r($page);

        // echo $page->filter('.maincounter-number')->text();

        $page->filter('#maincounter-wrap')->each(function ($item) {
            $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
        });

        $data = $this->results;
        return view('scraper', compact('data'));
    }

    public function handiScrap()
    {
        $client = new Client();
        $url = 'https://agenda.handicap.fr/?month=2023-01-01';
        $page = $client->request('GET', $url);

        $page->filter('td')->each(function ($item){
            // Value = key
            $this->results[] = $item->text() ;
            
        });

        // echo "<pre>";
        // print_r($page);

        $data = $this->results;
        // echo "<pre>";
        // print_r($data);

        return view('handiScrap', compact('data'));


        // $page->filter('td')->each(function ($node) {
        //     dump($node->text());
        // });

        //return $page->html();
    }

    private $title = array();
    private $date = array();
    private $description = array();
    private $place = array();
    private $hrefText = array();
    private $link = array();
    public $compteur = 0;

    public function handiScrap2 ()
    {
        $client = new Client();
        $url = 'https://agenda.handicap.fr/?month=2023-01-01';
        $page = $client->request('GET', $url);

        $page->filter('td:nth-child(1)')->each(function ($item){
            $this->date[] = $item->text() ;
        });
        $date = $this->date;
        echo "<pre>";
        print_r($date);


        $page->filter('td:nth-child(2) > h2')->each(function ($item){
            $this->title[] = $item->text() ;
        });
        $title = $this->title;
        echo "<pre>";
        print_r($title);


        $page->filter('td:nth-child(2) > p')->each(function ($item){
            if(substr($item->text(), 0, 31) !="Plus d'informations via le lien")
            {
                $this->description[] = $item->text() ;
            }
        });
        $description = $this->description;
        echo "<pre>";
        print_r($description);

        
        $page->filter('td:nth-child(2) > div > div > span')->each(function ($item){
                $this->place[] = $item->text() ;
        });
        $place = $this->place;
        echo "<pre>";
        print_r($place);


        $page->filter('td:nth-child(2) > p:nth-child(4) > a')->each(function ($item){
            $this->hrefText[] = $item->text() ;
            $this->link[] = $item->filter('a')->attr("href");
        });
        $hrefText = $this->hrefText;
        $link = $this->link;
        echo "<pre>";
        print_r($hrefText);
        print_r($link);
    }


    private $resultat = array();

    public function handiScrap3 ()
    {
        $client = new Client();
        $url = 'https://agenda.handicap.fr/?month=2023-01-01';
        $page = $client->request('GET', $url);

        $page->filter('td:nth-child(1)')->each(function ($item){
            $this->date[] = $item->text() ;
        });
        $date = $this->date;
        echo "<pre>";
        print_r($date);
        
        $page->filter('td:nth-child(2)')->each(function ($item){
            $this->title[] = $item->filter('[itemprop*=name]')->text() ;
            $this->description[] = $item->filter('[itemprop=description]')->text() ;
            $this->place[] = $item->filter('[itemprop=location] > span')->text() ;
            //$this->hrefText[] = $item->filter(' p:nth-child(4) ')->text() ;
            #agendatable > tbody:nth-child(1) > tr:nth-child(13) > td:nth-child(2) > p:nth-child(4) > a
            $this->compteur++;
        });
        $title = $this->title;
        $description = $this->description;
        $place = $this->place;
        $hrefText = $this->hrefText;
        echo "<pre>";
        print_r($title);
        print_r($description);
        print_r($place);
        //print_r($hrefText);

        $page->filter('td:nth-child(2) > p:nth-child(4) > a')->each(function ($item){
            $this->hrefText[] = $item->text() ;
            $this->link[] = $item->filter('a')->attr("href");
        });
        $hrefText = $this->hrefText;
        $link = $this->link;
        echo "<pre>";
        print_r($hrefText);
        print_r($link);
    }
}
