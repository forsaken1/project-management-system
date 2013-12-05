function AddEmployee(btn, project_id, user_id)
{
	$.ajax({
		url: '/admin/projects/employee/'+project_id+'/'+user_id,
		type: 'POST',
		dataType: 'json',
		success: function(data)
		{
			btn = $(btn);
			if(data.result)
			{
				btn.removeClass('btn-danger');
				btn.addClass('btn-info');
				btn.val('Исполнитель');
			}
			else
			{
				btn.removeClass('btn-info');
				btn.addClass('btn-danger');
				btn.val('Назначить исполнителем');
			}
		}
	});
}

function AddManager(btn, project_id, user_id)
{
	$.ajax({
		url: '/admin/projects/manager/'+project_id+'/'+user_id,
		type: 'POST',
		dataType: 'json',
		success: function(data)
		{
			btn = $(btn);
			if(data.result)
			{
				btn.removeClass('btn-danger');
				btn.addClass('btn-success');
				btn.val('Менеджер');
			}
			else
			{
				btn.removeClass('btn-success');
				btn.addClass('btn-danger');
				btn.val('Назначить менеджером');
			}
		}
	});
}