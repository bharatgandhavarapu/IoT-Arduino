$(document).ready(function(){
	$.ajax({
		url : "data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var humidity_values = [];
			var timeStamp = [];
			var temperature_values = [];

			for(var i in data) {
				humidity_values.push(data[i].humidity);
				timeStamp.push("timeStamp " + data[i].timeStamp);
				temperature_values.push(data[i].temperature);
			}

			var chartdata = {
				labels: timeStamp,
				datasets: [
					{
						label: "temperature",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temperature_values
					},
					{
						label: "humidity",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: humidity_values
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});

});