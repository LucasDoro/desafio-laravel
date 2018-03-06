app.controller('productsController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {

    $scope.categories = [];
    $scope.imagesUploaded = [];
    var route = '/administration/categories/';

    $scope.refreshCategories = function (data) {
        $http.get('/administration/categories/search/' + data).then(function (response) {
            $scope.categories = response.data;
        });
    };

    /**
     * Cria novos produtos ou edita os que ja existem
     * @param {*}  
     * @param {Object} product 
     */
    $scope.create = function ($event, product) {
        $event.preventDefault();

        var fd = new FormData();

        var url = '/administration/products/create';

        if(product.id !== undefined){
            fd.append('id', product.id);
            url = '/administration/products/edit';
        }

        fd.append('name', product.name);
        fd.append('description', product.description);

        if(product.file === undefined){
            fd.append('image', '');
        }else{
            fd.append('image', product.file[0]);
            for (var i = 1; i < product.file.length; i++) {
                fd.append('image' + i, product.file[i]);
            }
            fd.append('imagecount', product.file.length);
        }

        fd.append('price', product.price);

        for (var i = 0; i < product.categories.length; i++) {
            fd.append('categories[]', product.categories[i].id);
        }

        $rootScope.loading_el = true;
        
        $http.post(url, fd, {
            transformRequest: angular.identity,
            headers: { 'Content-Type': undefined }
        }).then(function (response) {

            $scope.success = true;
            $scope.msg = response.data.return.msg;
            $scope.imagesUploaded = response.data.return.images;
            $scope.fileread = []; 
            //
            if(product.id === undefined){
                $scope.product = {};
                angular.element('.file').val(null); // Remove a imagem do campo input, para evitar problemas
                $scope.fileread = null;
                $scope.productForm.$setUntouched();
                $scope.productForm.$setPristine();
            }

        }, function (error) {
            $scope.error = true;
            $scope.msg = error.data.return.msg;
        }).finally(function(){
            $rootScope.loading_el = false;
            angular.element('html,body').animate({
                scrollTop: angular.element('form').offset().top},
                'slow');
        });

    }

    /**
     * Deleta a imagem que já está no servidor
     * @param {*}  
     * @param {Object} product 
     * @param {int} imageId 
     */
    $scope.deleteImage = function($event, product, imageId){
        $event.preventDefault();

        $http.delete('/administration/products/delimage/'+product.id+'/'+imageId).then(function(response){
            angular.element('#'+imageId).remove();
        });
    }  

    /**
     * Deleta a imagem apenas no front
     * @param {*}  
     * @param {Object} product 
     * @param {*} file 
     */
    $scope.deleteImageFront = function($event, product, file){
        $event.preventDefault();
        var index = $scope.fileread.map(function(e){return e}).indexOf(file);
        $scope.fileread.splice(index, 1);
    }

}]);

app.controller('productListController', ['$scope', '$http', function($scope, $http){

    /**
     * Lista todos os produtos ou produtos por categoria
     * @param {int} categoryId 
     */
   $scope.listProducts = function(categoryId){

        if(categoryId === undefined) categoryId = '';

        $http.get('/administration/products/list/'+categoryId).then(function(response){
            $scope.products = response.data.return;
        });
    }

    /**
     * Starta o modo de exclusão
     * @param {*}  
     * @param {Object} product 
     * @param {boolean} status 
     */
    $scope.startEndDelete = function($event, product, status){
        $event.preventDefault();

        var index = $scope.products.map(function(e){return e.id}).indexOf(product.id);
        
        if(index !== -1){
            $scope.products[index].startDelete = status;
        }
            

    }

    /**
     * Deleta o produto
     * @param {*}  
     * @param {Object} product 
     */
    $scope.delete = function($event, product){
        $event.preventDefault();

        var index = $scope.products.map(function(e){return e.id}).indexOf(product.id);
        $scope.success = false;
        $scope.error = false;

        if(index !== -1 ){
            $http.delete('/administration/products/delete/'+product.id).then(function(response){
                $scope.products.splice(index, 1);
                $scope.success = true;
                $scope.msg = response.data.return;
            }, function(error){
                $scope.msg = error.data.return;
                $scope.error = true;
            });
        }
    }

}]);