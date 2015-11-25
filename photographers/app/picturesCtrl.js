
app.controller('picturesCtrl', function ($scope, $modal, $filter, Data) {
    $scope.student = {};
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


app.controller('picturetEditCtrl', function ($scope, $modalInstance, item, Data) {

  $scope.picture = angular.copy(item);

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