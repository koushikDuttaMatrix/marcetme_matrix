// this section for multiple image upload
// below code added for jquery multiple image upload section


// below code added for jquery multiple image upload section
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".classImg").click(function(){

if (confirm('Are you sure you want to delete this Image?')) {
  var imageid = $(this).data('id');

  var parentdivid = $(this).data('parentdivid');

  $.ajax({    
      type:'POST',
      url:assetUrl+'deleteBusinessImage?id='+imageid,
      success:function(jData){
        //console.log(jData['success'])
        if(jData['success'] =='true'){
       // $("#"+parentdivid).hide();
       $("#filediv_"+imageid).hide();
        $("#imageno").val(parseInt($("#imageno").val())-1);
        if(parseInt($("#imageno").val()) >= 5){
          $("#add_more").css("display","none");
        }else{ $("#add_more").css("display","block");}
        if(parseInt($("#imageno").val()) == 4)
        {
          location.reload();        }
        }
        else{
        alert("Some error occoured.");
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
      $(".err").html("Some server error occoured.</div>");
      }
    });
  }
    
});

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file',class:'fileUpld'}),
                $("")
                ));
        // added by koushik
        $("#imageno").val(parseInt($("#imageno").val())+1);
        if(parseInt($("#imageno").val()) == 4){
          $("#add_more").css("display","none");
        }else{ $("#add_more").css("display","block");}
    });
//following function will executes on change event of file input to select different file 
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {

              var iSize = this.files[0].size;
              var filesize = formatSizeUnits(iSize);
              //alert(filesize);
              if(filesize == true)
              {
                  abc += 1; //increementing global variable by 1
          var z = abc - 1;
                  var x = $(this).parent().find('#previewimg' + z).remove();
                  $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src='' height='50' width='50' /></div>");
          
                //  $("#imageno").val(parseInt($("#imageno").val()) +1);
          if(parseInt($("#imageno").val()) >= 5){
            $("#add_more").css("display","none");
          }else{ $("#add_more").css("display","block");}
            var reader = new FileReader();
                  reader.onload = imageIsLoaded;
                  reader.readAsDataURL(this.files[0]);
                 
            $(this).hide();
                  $("#abcd"+ abc).append($("<img/>", {id: 'img', 
                    src: assetUrl+'images/cross.png', alt: 'delete'}).click(function() {
                  $(this).parent().parent().remove();
          $("#imageno").val(parseInt($("#imageno").val()) - 1);
          if(parseInt($("#imageno").val()) >= 5){
            $("#add_more").css("display","none");
          }else{ $("#add_more").css("display","block");}
                  }));
              }
              else
              {
                alert("Maximum uploaded file size is 1MB.");
              }
            }
        });

/// checking the file size
function formatSizeUnits(bytes){
     var bytes = (bytes / 1024);
              
              if (bytes / 1024 > 1)
          {
          if (((bytes / 1024) / 1024) > 1)
          {
            bytes = (Math.round(((bytes / 1024) / 1024) * 100) / 100);
            return false;
          }
          else
          {
            bytes = (Math.round((bytes / 1024) * 100) / 100)
            if(bytes > 1)
            {
              return false;
            }
            else
            {
              return true;
            }
          } 
          }
          else
          {
            bytes = (Math.round(bytes * 100) / 100)
              return true;
          }
}

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});





/// checking the file size

function formatSizeUnits(bytes){
     var bytes = (bytes / 1024);
              
              if (bytes / 1024 > 1)
          {
          if (((bytes / 1024) / 1024) > 1)
          {
            bytes = (Math.round(((bytes / 1024) / 1024) * 100) / 100);
            return false;
          }
          else
          {
            bytes = (Math.round((bytes / 1024) * 100) / 100)
            if(bytes > 1)
            {
              return false;
            }
            else
            {
              return true;
            }
          } 
          }
          else
          {
            bytes = (Math.round(bytes * 100) / 100)
              return true;
          }
}

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });





$( "#country" ).change(function() {
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var countryid=$('#country').val();
 var url=assetUrl+'change-state?country_id='+countryid;
 $.ajax({
                    type: "POST",
                    url : url,
                    
                    success : function(data){
					$("#state").html(data);
					$("#city").html('<option>Select One</option>');
          //console.log(data);die();
           }
 });
});
$("#state" ).change(function() {
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);
 var stateid=$('#state').val();
 var url=assetUrl+'change-city?state_id='+stateid;
 $.ajax({
                    type: "POST",
                    url : url,
                    
                    success : function(data){
					$("#city").html(data);
                        console.log(data);die();
                    }
 });
});
$("#postComment" ).click(function() {

actionLink=$( '#commentForm' ).attr( 'action' );

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Check input( $( this ).val() ) for validity here
 // alert(assetUrl);

 var blogId=$('#blog_id').val();
 var user_id=$('#user_id').val();
 var comment=$("#comment").val();
 if(user_id=="")
 {
  alert('Please login');
  return false;
 }
 if(comment=="")
 {
  alert('Please enter a valid comment');
  return false;
 }

 var url=actionLink+'?blog_id='+blogId+'&comment='+comment;
 //var url=assetUrl+'comment?blog_id='+blogId;
 $.ajax({
                    type: "POST",
                    url : url,
                    
                    success : function(data){
                       $("#append_comment").append(data);
                       $("#comment").val('');
                      
                        //console.log(data);die();
                    }
 });
  event.preventDefault();
});

 
