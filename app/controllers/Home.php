<?php
class Home {

    public function index(Request $request, Response $response, array $params){
        echo "ok";
        $age = 21;
        $Validator = get('Validator');
        $cc = $Validator->name('age')->value($age)->min(18)->max(40);
        //var_dump($cc);
        if($cc->isSuccess()){
            echo "Validation ok!";
        }else{
            echo "Validation error!";
            var_dump($cc->getErrors());
        }
    }
    
}
