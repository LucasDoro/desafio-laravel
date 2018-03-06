<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Clients;
// use Laravel\Passport\Client;

class SettingsController extends Controller
{

    protected $users;

    public function __construct(User $user)
    {
        $this->users = $user;
    }

    /**
     * Carrega a página de controle da api
     *
     * @return view
     */
    public function index(){
        return view('administration.api.index');
    }

    /**
     * Lista os clientes já cadastrados e seus respectivos dados de api
     *
     * @return Response
     */
    public function listClients(){
        $users = $this->users->get();
        return $this->response($users, 200);
    }

    /**
     * Método invocado pela aplicação para criar um novo usuário da api
     *
     * @param UserRequest $userRequest
     * @return Response
     */
    public function create(UserRequest $userRequest){

        $user = $this->newUser($userRequest);
        $this->createOauthClient($user[0]);
        $token = $this->generateToken($user[0]);
        
        if($user[1])
            return $this->response(['msg' => 'Cliente cadastado com sucesso!', 'client' => $user[0], 'token' => $token], 200);
        else
            return $this->response(['msg' => 'Não foi possível cadastrar o usuário!', 'client' => ''], 422);
    }

    /**
     * Gera um token para a aplicação e atualiza o field token
     *
     * @param User $user
     * @return string
     */
    private function generateToken($user){
        $userToken = $this->users->find($user->id);
        $token =  $userToken->createToken('Grupo New Way')->accessToken;
        $userToken->token = $token;
        $userToken->update();
        return $token;
    }

    /**
     * Cria um novo usuário de api
     *
     * @param Request $userRequest
     * @return User
     */
    private function newUser($userRequest){
        $user = new User();
        $user->name = $userRequest->name;
        $user->email = $userRequest->email;
        $user->password = bcrypt($userRequest->password);
        
        $saved = $user->save();

        return [$user, $saved];
    }

    /**
     * Cria um novo cliente Oauth 2 do tipo acesso pessoal
     *
     * @param User $user
     * @return void
     */
    private function createOauthClient($user){
        $oaclient = new Clients();
        $oaclient->user_id=$user->id;
        $oaclient->name=$user->name;
        $oaclient->personal_access_client=1;
        $oaclient->redirect='http://localhost';
        $oaclient->revoked=0;
        $oaclient->secret=base64_encode(hash_hmac('sha256',$user->password, 'secret', true));
        $oaclient->password_client=0;
        
        $oaclient->save();
    }

    /**
     * Deleta o cliente, revogando o token
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
        $user = $this->users->find($id);

        if(!empty($user)){
            foreach($user->clients as $client){
                $client->delete();
            }
            $deleted = $user->delete();

            if($deleted){
                return $this->response('Cliente removido', 200);
            }else{
                return $this->response('Cliente não removido', 422);
            }

        }else{
            return $this->response('Cliente não removido', 422);
        }
        
    }

}
