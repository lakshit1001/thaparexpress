app.controller('blogsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.blog = {};
    Data.get('blogs').then(function(data){
        $scope.blogs= data.data;
    });
    
    $scope.deleteblog = function(blog){
        if(confirm("Are you sure to remove the blog")){
            Data.delete("blogs/"+blog.id).then(function(result){
                $scope.blogs = _.without($scope.blogs, _.findWhere($scope.blogs, {id:blog.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/blogEdit.html',
          controller: 'blogtEditCtrl',
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


app.controller('blogtEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.blog = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"blog"},
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
        $scope.title = (item.id > 0) ? 'Edit blog' : 'Add blog';
        $scope.buttonText = (item.id > 0) ? 'Update blog' : 'Add New blog';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.blog);
        }
        $scope.saveblog = function (blog) {
            blog.uid = $scope.uid;
            console.log(blog);
            if(blog.id > 0){
                Data.put('blogs/'+blog.id, blog).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(blog);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('blogs', blog).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(blog);
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