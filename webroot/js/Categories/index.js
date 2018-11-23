var app = angular.module('app',[]);

app.controller('CategoryCRUDController', ['$scope','CategoryCRUDService', function ($scope,CategoryCRUDService) {
	  
    $scope.updateCategory = function () {
        CategoryCRUDService.updateCategory($scope.category.id,$scope.category.name)
          .then(function success(response){
              $scope.message = 'Category data updated!';
              $scope.errorMessage = '';
              $scope.category.id = '';
              $scope.category.name = '';
              $scope.getAllCategories();
          },
          function error(response){
              $scope.errorMessage = 'Error updating Product Type!';
              $scope.message = '';
          });
    }
    
    $scope.getCategory = function ($id) {

        CategoryCRUDService.getCategory($id)
          .then(function success(response){
              $scope.category = response.data.data;
              $scope.category.id = $id;
              $scope.message='';
              $scope.errorMessage = '';
              $scope.getAllCategories();
              
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Category not found!';
              }
              else {
                  $scope.errorMessage = "Error getting Category!";
              }
          });
    }
    
    $scope.addCategory = function () {
        if ($scope.category != null && $scope.category.name) {
            CategoryCRUDService.addCategory($scope.category.name)
              .then (function success(response){
                  $scope.message = 'Category added!';
                  $scope.errorMessage = '';
                  $scope.category.id = '';
                  $scope.category.name = '';
                  $scope.getAllCategories();
              },
              function error(response){
                  $scope.errorMessage = 'Error adding Category!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }
    
    $scope.deleteCategory = function ($id) {
        CategoryCRUDService.deleteCategory($id)
          .then (function success(response){
              $scope.message = 'Product Type deleted!';
              $scope.category = null;
              $scope.errorMessage='';
              $scope.getAllCategories();
          },
          function error(response){
              $scope.errorMessage = 'Error deleting Category!';
              $scope.message='';
          })
    }
    
    $scope.getAllCategories = function () {
        CategoryCRUDService.getAllCategories()
          .then(function success(response){
              $scope.categories = response.data.data;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting Categories!';
          });
    }
    $scope.getAllCategories();
}]);

app.service('CategoryCRUDService',['$http', function ($http) {
	
    this.getCategory = function getCategory(categoryId){
        return $http({
          method: 'GET',
          url: urlToRestApi+'/'+categoryId,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
	}
	
    this.addCategory = function addCategory(name){
        return $http({
          method: 'POST',
          url: urlToRestApi,
          data: {name:name},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }
	
    this.deleteCategory = function deleteCategory(id){
        return $http({
          method: 'DELETE',
          url: urlToRestApi+'/'+id ,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.updateCategory = function updateCategory(id,name){
        return $http({
          method: 'PATCH',
          url: urlToRestApi+'/'+id,
          data: {name:name},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.getAllCategories = function getAllCategories(){
        return $http({
          method: 'GET',
          url: urlToRestApi,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}

        });
    }

}]);