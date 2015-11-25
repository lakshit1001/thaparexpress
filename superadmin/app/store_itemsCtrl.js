app.controller('store_itemsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.store_item = {};
    Data.get('store_items').then(function(data){
        $scope.store_items= data.data;
    });
    
    $scope.deletestore_item = function(store_item){
        if(confirm("Are you sure to remove the store_item")){
            Data.delete("store_items/"+store_item.id).then(function(result){
                $scope.store_items = _.without($scope.store_items, _.findWhere($scope.store_items, {id:store_item.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/store_itemEdit.html',
          controller: 'store_itemtEditCtrl',
          size: size,
          resolve: {
            item: function () {
              return p;
            }
          }
        });
        modalInstance.result.then(function(selectedObject) {
            if(selectedObject.save == "insert"){
                $scope.students.push(selectedObject);
                $scope.students = $filter('orderBy')($scope.students, 'id', 'reverse');
            }else if(selectedObject.save == "update"){
                p.name= selectedObject.name;
                p.cat= selectedObject.cat;
                p.price= selectedObject.price;
                p.condition= selectedObject.condition;
                p.status= selectedObject.status;  
                p.userid= selectedObject.userid;

            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"Cat",predicate:"cat",sortable:true},
                    {text:"price",predicate:"price",sortable:true},
                    {text:"condition",predicate:"condition",sortable:true},
                    {text:"status",predicate:"status",sortable:true},
                    {text:"userid",predicate:"userid",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('store_itemtEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.store_item = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"store_item"},
      file: file
    });

    file.upload.then(function (response) {
      $timeout(function () {
        file.result = response.data;
      });
    }, function (response) {
      if (response.status > 0)
        $scope.errorMsg = response.status + ': ' + response.data;
      });

      file.upload.progress(function (evt) {
        // Math.min is to fix IE which reports 200% sometimes
        file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
      });
    };

        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit store_item' : 'Add store_item';
        $scope.buttonText = (item.id > 0) ? 'Update store_item' : 'Add New store_item';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.store_item);
        }
        $scope.savestore_item = function (store_item) {
            store_item.uid = $scope.uid;
            console.log(store_item);
            if(store_item.id > 0){
                Data.put('store_items/'+store_item.id, store_item).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(store_item);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('store_items', store_item).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(store_item);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
});