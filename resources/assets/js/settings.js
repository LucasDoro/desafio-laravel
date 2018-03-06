app.controller('settingsController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {

    $scope.clients = [];
    $scope.startDelete = false;

    var base = '/administration/settings/';
 
    // Lista todos os usuarios e cliente na base de dados
    $http.get(base+'list').then(function(response){
        $scope.clients = response.data.return;
    });

    /**
     * Altera para o modo de exclusão
     * @param {*}  
     * @param {int} index 
     * @param {boolean} status 
     */
    $scope.changeDelete = function($event, index, status){
        $event.preventDefault();
        $scope.clients[index].startDelete = status;
    }

    /**
     * Deleta um usuário
     * 
     * @param {*}  
     * @param {int} id 
     * @param {int} index 
     */
    $scope.delete = function($event, id, index){
        $rootScope.loading_el = true;

        $http.delete(base+'delete/'+id).then(function(){
            $scope.clients.splice(index, 1);
        }).finally(function(){
            $rootScope.loading_el = false;
        });
    }

    /**
     * Cria um novo usuário
     * @param {*}  
     * @param {Object} client 
     */
    $scope.create = function($event, client){

        $event.preventDefault();

        $rootScope.loading_el = true;

        $http.post(base+'create', client).then(function(response) {
            response.data.return.client.token = response.data.return.token;
            $scope.clients.push(response.data.return.client);
            console.log(response);
            $scope.success = true;
            $scope.msg = response.data.return.msg;

            $scope.client = {};
            $scope.clientForm.$setUntouched();
            $scope.clientForm.$setPristine();
        }, function(response){
            $scope.error = true;

            if(response.data.return !== undefined){
                $scope.msg = response.data.return.msg;
            }else{
                $scope.msg = response.data.errors;
            }
            
        }).finally(function(){
            $rootScope.loading_el = false;
        });

    }

}]);