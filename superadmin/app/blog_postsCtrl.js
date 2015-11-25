app.controller('blog_postsCtrl', function ($scope, $modal, $filter, Data) {
    $scope.blog_post = {};
    Data.get('blog_posts').then(function(data){
        $scope.blog_posts= data.data;
    });
    
    $scope.deleteblog_post = function(blog_post){
        if(confirm("Are you sure to remove the blog_post")){
            Data.delete("blog_posts/"+blog_post.id).then(function(result){
                $scope.blog_posts = _.without($scope.blog_posts, _.findWhere($scope.blog_posts, {id:blog_post.id}));
            });
        }
    };
    $scope.open = function (p,size) {
        var modalInstance = $modal.open({
          templateUrl: 'partials/blog_postEdit.html',
          controller: 'blog_posttEditCtrl',
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
                p.content= selectedObject.content;
                
            }
        });
    };

 $scope.columns = [
                    {text:"ID",predicate:"id",sortable:true,dataType:"number"},
                    {text:"Name",predicate:"name",sortable:true},
                    {text:"content",predicate:"content",sortable:true},
                    {text:"image",predicate:"image",sortable:true},
                    {text:"blogid",predicate:"blogid",sortable:true},
                    {text:"Action",predicate:"",sortable:false}
                ];

});


app.controller('blog_posttEditCtrl', function ($scope, $modalInstance,Upload,$timeout, item, Data) {

  $scope.blog_post = angular.copy(item);

  $scope.uploadPic = function(file) {
    console.log("Something is happening.");
    file.upload = Upload.upload({
      url: 'http://thaparexpress.com/superadmin/image_upload.php',
      method: 'POST',
      sendFieldsAs: 'form',
      fields: {name: $scope.event.id,type:"blog_post"},
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
        $scope.title = (item.id > 0) ? 'Edit blog_post' : 'Add blog_post';
        $scope.buttonText = (item.id > 0) ? 'Update blog_post' : 'Add New blog_post';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.blog_post);
        }
        $scope.saveblog_post = function (blog_post) {
            blog_post.uid = $scope.uid;
            console.log(blog_post);
            if(blog_post.id > 0){
                Data.put('blog_posts/'+blog_post.id, blog_post).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(blog_post);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                Data.post('blog_posts', blog_post).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(blog_post);
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