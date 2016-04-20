//============================================================================
//==slug cresting===========
function cmspageSlug(id = '')
{
	
	var url = base_url + 'admin/cmspages/pageSlug/';
	var page_title = $( "#page_title" ).val();

	if(page_title)
	{
		$.post(url,
			{
			  page_title: page_title,
			  id:id
			},
			function(data,status){
				if(data)
				  {
					 
					if(data == 0)
					  {
						 $( "#page_title" ).val('');	
						 $( "#page_slug" ).val('');
						 $('input[name=page_title]').focus();
						 alert('This page title already available.');
					 }else{
						 $( "#page_slug" ).val(data);
						 $( "#Slug" ).val(data);
					 }
				  }
			});
	}
}
//============================================================================

