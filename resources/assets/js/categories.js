app.controller('categoriesController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {

    $scope.categories = [];
    var route = '/administration/categories/';

    /**
     * Cria uma nova categoria
     * @param {*}  
     * @param {Object} category 
     */
    $scope.create = function ($event, category) {
        $event.preventDefault();

        var fd = new FormData();
        fd.append('name', category.name);
        fd.append('file', category.file);

        $scope.success = false;
        $scope.error = false;

        $scope.msg = false;

        $rootScope.loading_el = true;

        $http.post('/administration/categories/create', fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (response) {

            $scope.success = true;
            $scope.msg = response.data.return.msg;

            if($rootScope.newCategories == undefined)$rootScope.newCategories = [];

            $rootScope.newCategories.push(response.data.return.category);

            $scope.category = {};
            angular.element('.file').val(null); // Remove a imagem do campo input, para evitar problemas
            $scope.fileread = null;
            $scope.categoryForm.$setUntouched();
            $scope.categoryForm.$setPristine();

        }, function (error) {
            $scope.error = true;
            $scope.msg = response.data.return.msg;
        }).finally(function(){
            $rootScope.loading_el = false;
            angular.element('html,body').animate({
                scrollTop: angular.element('form').offset().top},
                'slow');
        });

    };

    /** 
     * Lista todos as categorias
    */
    $scope.list = function () {
        $http.get(route + 'list-all').then(function (response) {
            $scope.categories = response.data;
        });
    };

    /**
     * Deleta as imagens antes de subi-las
     */
    $scope.deleteImage = function(){
        delete $scope.category.file;
        $scope.fileread = null;
        angular.element('.file').val(null);
    }

    /**
     * Ativa o modo de exclusão
     * 
     * @param {*}  
     * @param {boolean} delete_action 
     * @param {int} id 
     */
    $scope.chooseDelete = function ($event, delete_action, id) {

        $event.preventDefault();

        var index = $scope.categories.map(function (t) {
            return t.id;
        }).indexOf(id);

        if (index !== -1)
            $scope.categories[index].delete_action = delete_action;
    };

    /**
     * Deleta uma categoria
     * 
     * @param {*}  
     * @param {int} id 
     */
    $scope.delete = function ($event, id) {

        $event.preventDefault();

        var index = $scope.categories.map(function (t) {
            return t.id;
        }).indexOf(id);

        $http.delete(route + 'delete/' + id).then(function (response) {

            if (index !== -1) {
                angular.element('.navbar-nav #'+id).remove();
                $scope.categories.splice(index, 1);
            }
        }, function (error) {
            console.log(error);
        });

    }

    /**
     * Edita uma categoria
     * @param {*}  
     * @param {Object} category 
     * @param {int} id 
     */
    $scope.edit = function ($event, category, id) {

        $scope.success = false;
        $scope.error = false;

        $rootScope.loading_el = true;

        $scope.msg = false;

        $event.preventDefault();

        var fd = new FormData();

        fd.append('id', id);
        fd.append('name', category.name);

        if(category.file !== undefined)
            fd.append('file', category.file);

        $http.post(route+'edit', fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (response) {

            $scope.success = true;
            $scope.msg = response.data.return.msg;

            $scope.fileread = null;

            if(response.data.return.file_updated !== false)
                angular.element('.image-uploaded').attr('src', '/'+response.data.return.file_updated);

            angular.element('.file').val(null); // Remove a imagem do campo input, para evitar problemas
            $scope.fileread = null;

        }, function (error) {
            $scope.error = true;
            $scope.msg = error.response.data.return.msg;
        }).finally(function(){
            $rootScope.loading_el = false;
            angular.element('html,body').animate({
                scrollTop: angular.element('form').offset().top},
                'slow');
        });
    }

}]);