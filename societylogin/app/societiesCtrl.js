app.controller('societiesCtrl', function ($scope, $modal, $filter, Data) {
    $scope.society = {};
    Data.get('society/'+$scope.societylogin).then(function(data){
        $scope.society= data.data;
        
    });
    
    $scope.deletesociety = function(society){
        if(confirm("Are you sure to remove the society")){
            Data.delete("societies/"+society.id).then(function(result){
                $scope.societies = _.without($scope.societies, _.findWhere($scope.societies, {id:society.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/societyEdit.html',
          controller: 'societytEditCtrl',
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


app.controller('societytEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.society = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"society"},
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
        $scope.title = (item.id > 0) ? 'Edit society' : 'Add society';
        $scope.buttonText = (item.id > 0) ? 'Update society' : 'Add New society';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.society);
        }
        $scope.savesociety = function (society) {
            society.uid = $scope.uid;
            console.log(society);
            if(society.id > 0){
                Data.put('societies/'+society.id, society).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(society);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('societies', society).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(society);
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