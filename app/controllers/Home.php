<?php
class Home extends Controller{

    public function index(Request $request, Response $response, array $params){
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
          <title>Bootstrap 5 Example</title>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
          <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js'></script>
        </head>
        <body>";
        if (!session_id()) @session_start();
        $age = 21;
        
        $users = [
            [
                'name' => 'Kenny Katzgrau',
                'username' => 'katzgrau',
            ],
            [
                'name' => 'Dan Horrigan',
                'username' => 'dhrrgn',
            ],
        ];
        $Validator = get('Validator');
        $msg = get('FM');
        $msg->info('This is an info message');
        $msg->success('This is a success message');
        $msg->warning('This is a warning message');
        $msg->error('This is an error message');
        
        
        // If you need to check for errors (eg: when validating a form) you can:
        if ($msg->hasErrors()) {
            // There ARE errors
        } else {
          // There are NOT any errors
        }
            
        // Wherever you want to display the messages simply call:
        $msg->display();
        $cc = $Validator->name('age')->value($age)->min(18)->max(40);
        //var_dump($cc);
        if($cc->isSuccess()){
            echo "Validation ok!";
        }else{
            echo "Validation error!";
            var_dump($cc->getErrors());
        }
    }
    public function login(Request $request, Response $response, array $params){
        $body = $this->view('user.login');
        //$body = 'ol';
        $response->write($body)->statusCode(404)->cookie('4242', 'simooo')->send();
        //return $response->header('Location', 'https://www.google.com')->statusCode(302)->send();


    }
    public function user(Request $request, Response $response, array $params){
        $this->view('user.login');
    }
}
