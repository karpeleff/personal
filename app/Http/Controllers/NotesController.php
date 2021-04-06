<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Action;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Exception;

class NotesController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $data = Note::paginate(15);
        return view('notes/index',['data' => $data]);
    }


    public  function  createNote(Request $request)
    {
        $record = $request->all();
        Note::create($record);
        return  $this->index();
    }

    public function  getAll()
    {
        $data = Note::paginate(15);
        return view('notes/all',['data' => $data]);
    }

    public function  form_add()
    {
        return view('notes/add');
    }

    public function  ajax()
    {
        return view('notes/ajax');
    }




    public function  createAction(Request $request)
    {

         $mutable = Carbon::now()->addHours(10);
         $record                  =  new Action;
         $record->action          = $request->action;
         $record->local_date_time = $mutable;
         $record->save();
         return  $this->allAction();
    }

    public function  allAction()
    {
        $date = Carbon::now()->addHours(10);
        $date = substr($date, 0, 10);
        $data = Action::where('local_date_time', 'like', $date.'%')->simplePaginate(15);
        return view('karina/index',['data' => $data]);

    }

    public function resume()
    {
        return view('notes/resume');
    }

//загрузка файла
    public function getForm()
    {
        return view('notes/upload-form');
    }

    public function upload(Request $request)
    {
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
            }
        }
        return "Успех";
    }
//

    public function AmoCrm()
    {
       // echo 'hello';
        return view('notes/amo');
    }
public function AuthRequest()
{
    $subdomain = 'alekseykarpelev'; //Поддомен нужного аккаунта
    $link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

    /** Соберем данные для запроса */
    $data = [
        'client_id' => 'a74063f2-7826-4805-88d0-1982a69be5d0',
        'client_secret' => 'RXzgHv2L7TEwx10GkNsJJIcoPKqT3bAsIbe8KV8q4A5ULNmp0l5mjRT3fQkieZbc',
        'grant_type' => 'authorization_code',
        'code' => 'def50200693da361f60849198917fb7b4b4aac4af27e83dd4178b4f71e5f55656ce4d7acaf93e127dcf646148a3b04c02ba5f074fa7afa738e8a034e726a61403534c9a845a0d929220295b7ce7c7c61b3767f819c0358005678ef73808f336a290cf6cff62bfc6d196000c4b67b6dfc9a4bf3f7dbbf8033b4c660fa3e3829ea4f05b86dde7c1836671fb462b0261b37af6c1b7701a41e1c58f062c7b377b9a9a1cbe5ba7f63c4c3b975502b34ea949f3a7b3da218d31a8d3e4d8013a2053e7a52ca9506dcb99235844df90e19a9c8c764bb788d4380ac8d68b31a722dc39c414ca6f67c34f2e9aad8b95bfc8643e7ec403033a9e2325a305d29b45a575427d39eceafc1553e47d30ea1d28ecbfdb6e79ff3091d66205e78a8d84cf7ab3a1937dd5947ede4d2a70239ba7035a99d724c57ffaf3fc5aea281fbb6f65427a4e12785f8c5ec47a320cb05fd9eac8b52427c3ceb7143932b200392ae5f348ecd372b17cf27f7d0a2e6269ad08f5cd4dc2386211ff3067ec763ec00fb7f0d8c09cea6f2f3f9b0463ee1c4af513adfcca8fd36dd81cf59efa291a4c64e5e6785aea325029983338429ceda03cfee2586d6ab4e30882b57ea186c95ed13cce43cbafadf262f0e9eaf1d21939979bf1ff47e460077d5825b06e0c1aa2939eafb94a3672b336c87f0061c645eae86dac2ba28cc830c211f97f8ff126b40045975485c3c63f85105a46ce361f493f5dc6e1c53adbcc92c6b8ab835778df3a3049e844f5af854dac456b8b0d7e85eb35c4a4e7cea982fd0fb5d764ac5c674916e919e1b89b41fed99c19de9ab6a21379ed567b3181e7bd7b505047d8c64b30e36ecd919a51f6331481765d158a3aa70af3121bb4226b09c77530ca028550d664b6960fc95c159ac67d4c2bdb2c39815c5c4c7f2975d4e9881c3aadaaee46b207907d545b3fd9fc6601cfa40504d8459d34bfa68d53a68fec3408c56c93e56f5a61f2eb3192f46251f13ff5bae97f39db32bc2c29b057d90f6e0439f7d487e9922ccf531342a6df7cc4f0ff6f7f1b0d1ab0d12543a6f1d7787b3eab02eacc55d3ffbb10b8d8491b182666&state=state&referer=alexeykarpelev.amocrm.ru&client_id=a74063f2-7826-4805-88d0-1982a69be5d0',
    'redirect_uri' => 'https://karpelev.com/amo/',

    ];

    /**
     * Нам необходимо инициировать запрос к серверу.
     * Воспользуемся библиотекой cURL (поставляется в составе PHP).
     * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
     */
    $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
    /** Устанавливаем необходимые опции для сеанса cURL  */
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
    curl_setopt($curl,CURLOPT_URL, $link);
    curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
    curl_setopt($curl,CURLOPT_HEADER, false);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
    $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    /** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
    $code = (int)$code;
    $errors = [
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal server error',
        502 => 'Bad gateway',
        503 => 'Service unavailable',
    ];

    try
    {
        /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
        if ($code < 200 || $code > 204) {
            throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
        }
    }
    catch(\Exception $e)
    {
        die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
    }

    /**
     * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
     * нам придётся перевести ответ в формат, понятный PHP
     */
    $response = json_decode($out, true);

    $access_token = $response['access_token']; //Access токен
    $refresh_token = $response['refresh_token']; //Refresh токен
    $token_type = $response['token_type']; //Тип токена
    $expires_in = $response['expires_in']; //Через сколько действие токена истекает

    echo $access_token;

}


}
