<script>

	$(document).ready(function() {
	    checkInputNumber();
	});

	function toggle(source) {
		checkboxes = document.getElementsByName('id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function checkInputNumber()
	{
		$('.onlyNumber').keypress(function(e) {
	        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	           	return false;
		    }
	    });
	}

	function updateIndexData()
	{
		var values1 = $('input[name^="id"]').map(function () {
		  	return this.value;
		}).get();

		var values2 = $('input[name^="weight_number"]').map(function () {
		  	return this.value;
		}).get();

		$.ajax(
		{
			type:'post',
			url: '{{ url("admin/products/updateIndexData") }}',
			data:{
				'id': values1,
				'weight_number': values2,
			},
			success: function(data)
			{
				if(data) {
					window.location.reload();
				}
			}
		});
		// window.location.reload();
	}

</script>