// Search teams with ajax
$(document).ready(function() {
	var server_rendered = $('#replace').html();
	console.log(server_rendered);
	$('#search').keyup(function() {
		//Store search name
		var input_name = $(this).val();

		if (input_name != '') {
			$.ajax({
				url: 'http://localhost/FourGoal/api/teams/read.php',
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					$.each(data, function(key, value) {
						if (value.name.search(input_name) != -1) {
							//Empty preloaded content
							$('#replace').html('');
							//prettier-ignore
							$('#replace').append(`
                            <div>
                                <div class="card-content">
                                    <div class="row">
                                        <span class="card-title  grey-text text-darken-4">${value.name}</span>
                                    </div>
                                    <div class="row">
                                        <a class="waves-effect waves-light btn green" href="http://localhost/FourGoal/app/scripts/join_team.php?team_id=${value.id}">Join Team</a>
                                    </div>
                                </div>
                        </div>`);
						}
					});
				}
			});
		} else {
			$('#replace').html(server_rendered);
		}
	});
});
