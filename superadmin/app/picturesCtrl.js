app.controller('picturesCtrl', function ($scope, $modal, $filter, Data) {
    $scope.picture = {};
    Data.get('pictures').then(function(data){
        $scope.pictures= data.data;
    });
    
    $scope.deletepicture = function(picture){
        if(confirm("Are you sure to remove the picture")){
            Data.delete("pictures/"+picture.id).then(function(result){
                $scope.pictures = _.without($scope.pictures, _.findWhere($scope.pictures, {id:picture.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/pictureEdit.html',
          controller: 'picturetEditCtrl',
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
                p.category= selectedObject.category;
                p.email= selectedObject.email;
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"E-mail ID",predicate:"eid",sortable:true},
                    {text:"Category",predicate:"category",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('picturetEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.picture = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"picture"},
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
        $scope.title = (item.id > 0) ? 'Edit picture' : 'Add picture';
        $scope.buttonText = (item.id > 0) ? 'Update picture' : 'Add New picture';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.picture);
        }
        $scope.savepicture = function (picture) {
            picture.uid = $scope.uid;
            console.log(picture);
            if(picture.id > 0){
                Data.put('pictures/'+picture.id, picture).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(picture);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('pictures', picture).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(picture);
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