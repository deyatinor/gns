<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function showGet()
	{
	    $year = Input::get("year");
	    if (!in_array($year,array("2015", "2016"))){
	        $year = "2015";
	    }
	    $data = $this->getFromRemote('2015');
	    $i = 0;
	    foreach ($data as $row){
	        echo $i." ";
	        try{
	            if (!Game::where("Season",$row["Season"])->where("Status", $row["Status"])->where("HomeTeam", $row["HomeTeam"])->where("AwayTeam", $row["AwayTeam"])->count())
        	        Game::firstOrCreate($row);
	        }catch(Exception $e){
	            echo $e->getMessage();
	        }
	        
	        $i++;
	        if ($i==10){
	            break;
	        }
	    }
	    echo "Done successfully";
	}
	
	public function showAll()
	{
	    $games = Game::all()->all();
	    return View::make("all")->with("games",$games);
	}
	
	public function showJson()
	{
	    $games = Game::all()->all();
	    echo json_encode($games);
	}
	
	private function getFromRemote($year, $format = "JSON")
    {
        require_once 'HTTP/Request2.php';
        $request = new Http_Request2('https://api.fantasydata.net/mlb/v2/'.$format.'/Games/'.$year);
        $url = $request->getUrl();
        $request->setAdapter('curl');

        $headers = array(
            // Request headers
            'Ocp-Apim-Subscription-Key' => Config::get('app.fantasydata_subscription_key')
        );

        $request->setHeader($headers);

        $parameters = array(
            // Request parameters
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_GET);
        
        //phpinfo();

        // Request body
        $request->setBody("{body}");

        try
        {
            $response = $request->send();
            $xmlString = $response->getBody();
            $xml = json_decode($xmlString,1);
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }
        
        return $xml;
    }
    
    public function showInputMatrix()
    {
        return View::make("input-matrix",array("message"=>""));
    }
    
    public function calculateMatrix()
    {
        $xm = Input::get("xmatrix");
        $ym = Input::get("ymatrix");
        $xp = Input::get("xpoint");
        $yp = Input::get("ypoint");
        if (is_int($xm) && is_int($ym) && is_int($xp) && is_int($yp)){
            $max = max($xp,$yp, abs($xm-$xp), abs($ym-$yp));
            $ending = ($max%10==1)?"":(($max%10<5)?"а":"ов");
            $message = "Программа завоюет мир за ".$max." ход".$ending.".<br />";
        } else {
            $message = "Все значения должны быть числами<br />";
        }
        return View::make("input-matrix",array("message"=>$message));
    }

}
