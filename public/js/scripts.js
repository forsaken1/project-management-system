function AddPeople(selector, project_id, user_id)
{
	selector = $(selector);
	$.ajax({
		url: '/admin/projects/people/'+project_id+'/'+user_id+'/'+selector.val(),
		type: 'POST',
		dataType: 'json',
		success: function(data)
		{
			
		}
	});
}
