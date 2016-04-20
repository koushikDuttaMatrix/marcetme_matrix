$(document).ready(function() {
  // Handler for .ready() called.
   alert("here");
  $("input[type='radio'][name='file_type']:checked");
});
function deleteCategory(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var catrgoryid=$('#catrgoryId_'+id).val();
  if (confirm("Are you sure you want to delete")) {
    
var url=base_url+'/admin/delete-category?id='+catrgoryid;
 
 
 $.ajax({
                    type: "GET",
                    url : url,
                    
                    success : function(data){
                      console.log(data); 
                      
                        alert("SuccessFully Deleted")
                        location.reload();
                        //console.log(data);die();
                      
                    }
 
 });





  }
}



function deleteBlog(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var blogid=$('#blogId_'+id).val();
  if (confirm("Are you sure you want to delete")) {
    
var url=base_url+'/admin/delete-blog?id='+blogid;
 
 
 $.ajax({
                    type: "GET",
                    url : url,
                    
                    success : function(data){
                      console.log(data); 
                      
                        alert("SuccessFully Deleted")
                        location.reload();
                        //console.log(data);die();
                    }
 
 });





  }
}

function deleteCms(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var cmsid=$('#cmsId_'+id).val();
  if (confirm("Are you sure you want to delete")) {
    
var url=base_url+'/admin/delete-cms?id='+cmsid;
 
 
 $.ajax({
                    type: "GET",
                    url : url,
                    
                    success : function(data){
                      console.log(data); 
                      
                        alert("SuccessFully Deleted")
                        location.reload();
                        //console.log(data);die();
                      
                    }
 
 });





  }
}

function deleteArticle(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var articleid=$('#articleId_'+id).val();
  if (confirm("Are you sure you want to delete")) {
    
var url=base_url+'/admin/delete-article?id='+articleid;
 
 
 $.ajax({
                    type: "GET",
                    url : url,
                    
                    success : function(data){
                      console.log(data); 
                      
                        alert("SuccessFully Deleted")
                        location.reload();
                        //console.log(data);die();
                      
                    }
 
 });





  }

}

function deleteJob(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var jobid=$('#jobId_'+id).val();
  if (confirm("Are you sure you want to delete")) {
    
var url=base_url+'/admin/delete-success?id='+jobid;
 
 
 $.ajax({
                    type: "GET",
                    url : url,
                    
                    success : function(data){
                      console.log(data); 
                      
                        alert("SuccessFully Deleted")
                        location.reload();
                        //console.log(data);die();
                      
                    }
 
 });





  }
}
$( "#image" ).click(function() {
   $(".imageDiv").show();
   $(".videoDiv").hide();
//$( ".imageDiv" ).toggle( show );
});
$( "#video" ).click(function() {
$(".videoDiv").show();
   $(".imageDiv").hide();
});
$( "#video_type" ).change(function() {
  var videoType=$("#video_type").val();
  if(videoType!="")
 $(".embedText").show();
 else
  $(".embedText").hide();
});




