 api_integration_laravel
first import in controller file:
use Illuminate\Support\Facades\Http;

Example:
$response=Http::get(URL);
For array output:

$response->json(), $response->collect(), $response->collect()->all()------all are provide array response output
For view headers of api: 
$response->headers();

Add API Header if need:
Http::withHeaders([
  'Content-Type'=>'application/json',
  if need add more ........
  
])->post/get/put/delete(URL);

Add response timeout:
Http::timeout(5)->get(URL); //wait max number of sec.

