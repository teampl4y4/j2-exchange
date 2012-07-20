	$(function () {
		var data = [];
        data[0] = { label: 'Offer #1', data: Math.floor(Math.random()*100)+1 };
        data[1] = { label: 'Offer #2', data: Math.floor(Math.random()*100)+1 };
        data[2] = { label: 'Offer #3', data: Math.floor(Math.random()*100)+1 };
        data[3] = { label: 'Offer #4', data: Math.floor(Math.random()*100)+1 };
        data[4] = { label: 'Offer #5', data: Math.floor(Math.random()*100)+1 };
        data[5] = { label: 'Offer #6', data: Math.floor(Math.random()*100)+1 };
        data[6] = { label: 'Offer #7', data: Math.floor(Math.random()*100)+1 };
        data[7] = { label: 'Offer #8', data: Math.floor(Math.random()*100)+1 };
        data[8] = { label: 'Offer #9', data: Math.floor(Math.random()*100)+1 };
        data[9] = { label: 'Offer #10', data: Math.floor(Math.random()*100)+1 };

	$.plot($("#donut"), data,
	{
			series: {
				pie: { 
					show: true,
					innerRadius: 0.5,
					radius: 1
				}
			},
			legend: {
				show: true,
				noColumns: 1, // number of colums in legend table
				labelFormatter: null, // fn: string -> string
				labelBoxBorderColor: "#000", // border color for the little label boxes
				container: null, // container (as jQuery object) to put legend in, null means default on top of graph
				position: "ne", // position of default legend container within plot
				margin: [5, 10], // distance from grid edge to default legend container within plot
				backgroundColor: "#efefef", // null means auto-detect
				backgroundOpacity: 1 // set to 0 to avoid background
			},
			grid: {
				hoverable: true,
				clickable: true
			}
	})
});

	
