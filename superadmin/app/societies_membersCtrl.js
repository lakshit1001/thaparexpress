app.controller('society_membersCtrl', function ($scope, $modal, $filter, Data) {
    $scope.society_member = {};
    Data.get('societies_members').then(function(data){
        $scope.societies_members= data.data;
    });
    
    $scope.deletesocieties_member = function(societies_member){
        if(confirm("Are you sure to remove the societies_member")){
            Data.delete("societies_members/"+societies_member.id).then(function(result){
                $scope.societies_members = _.without($scope.societies_members, _.findWhere($scope.societies_members, {id:societies_member.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/societies_memberEdit.html',
          controller: 'societies_membertEditCtrl',
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


app.controller('societies_membertEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.societies_member = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"societies_member"},
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
        $scope.title = (item.id > 0) ? 'Edit societies_member' : 'Add societies_member';
        $scope.buttonText = (item.id > 0) ? 'Update societies_member' : 'Add New societies_member';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.societies_member);
        }
        $scope.savesocieties_member = function (societies_member) {
            societies_member.uid = $scope.uid;
            console.log(societies_member);
            if(societies_member.id > 0){
                Data.put('societies_members/'+societies_member.id, societies_member).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(societies_member);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('societies_members', societies_member).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(societies_member);
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