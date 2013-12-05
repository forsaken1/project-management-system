function AddEmployee(btn, project_id, user_id)
{
	$.ajax({
		url: 'project/add_employer/'+project_id+'/'+user_id,
		type: 'POST',
		dataType: 'json',
		success: success_callback
	});
}

function AddManager(btn, project_id, user_id)
{
	$.ajax({
		url: 'project/add_manager/'+project_id+'/'+user_id,
		type: 'POST',
		dataType: 'json',
		success: success_callback
	});
}