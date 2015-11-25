app.controller('albumsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.album = {};
    Data.get('albums').then(function(data){
        $scope.albums= data.data;
    });
    
    $scope.deletealbum = function(album){
        if(confirm("Are you sure to remove the album")){
            Data.delete("albums/"+album.id).then(function(result){
                $scope.albums = _.without($scope.albums, _.findWhere($scope.albums, {id:album.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/albumEdit.html',
          controller: 'albumtEditCtrl',
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
                p.venue= selectedObject.venue;
                p.title= selectedObject.title;
                p.caption= selectedObject.caption;
                p.image= selectedObject.image;
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


app.controller('albumtEditCtrl', function ($scope,Upload,$timeout, $modalInstance, item, Data) {

  $scope.album = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"album"},
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
        $scope.title = (item.id > 0) ? 'Edit album' : 'Add album';
        $scope.buttonText = (item.id > 0) ? 'Update album' : 'Add New album';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.album);
        }
        $scope.savealbum = function (album) {
            album.uid = $scope.uid;
            console.log(album);
            if(album.id > 0){
                Data.put('albums/'+album.id, album).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(album);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('albums', album).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(album);
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