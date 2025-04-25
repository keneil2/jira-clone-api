<?php
namespace App\Http\Response;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
class ApiResponse extends HttpResponseException implements Responsable  
{
    protected int $httpCode;
    protected array $data;
    protected string $error_message;
    public function __construct(int $httpCode, array $data, string $message)
    {
        if (! (($httpCode >= 200 && $httpCode <= 300) || ($httpCode >= 400 && $httpCode <= 600))) {
            throw new \RuntimeException($httpCode . ' is not valid');
          }
  
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->error_message = $message;
    }
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $payload = match (true) {
            $this->httpCode >= 500 => ["error_message" => "Server Error"],
            $this->httpCode >= 400 => ["error_message" => $this->error_message],
            $this->httpCode >= 200 => ["data" => $this->data, "message" => $this->error_message],
        };

        return response()->json(
            data:$payload,
            status:$this->httpCode,
            options:JSON_UNESCAPED_UNICODE
        );
    }

    public static function ok(array $data,$message=""){
      return new static (200,$data,$message);
    }
    public static function created(array $data,$message=""){
      return new static (201,$data,$message);
    }
    public static function notFound(array $data=[],$message="Item Not found"){
      return new static (201,$data,$message);
    }
    public static function serverError(array $data=[],$message="Server Error"){
      return new static (500,[],$message);
    }

    public function rollback($e,$message){
        DB::rollBack();
        self::throw($e,$message);
    }
    public static function throw($e, $message ="Something went wrong! Process not completed"){
        Log::error($e);
        throw new HttpResponseException(response()->json(["message"=> $message], 500));
    }
}