$(document).ready(function(){
	$("form").submit(function(e){
		e.preventDefault();
		// set zero width to progress bar
		$(".progress-bar").css({
			width: "0%",
		});

		var file = document.querySelector("#myfile").files[0];
		var file_name = file.name;
		var file_type = file.type;

		// prepare file information
		var file_information = {
			Key: file_name,
			ContentType: file_type,
			Body: file,
			ACL: "public-read"
		}

		// access bucket
		var bucket = new AWS.S3({
			params: {Bucket: "erp.wes.com"}
		});

		// upload code
		bucket.upload(file_information).on("httpUploadProgress",function(e){
			var loaded = e.loaded;
			var total = e.total;

			var l_mb = loaded/1024/1024;
			l_mb = l_mb.toFixed(1)+"Mb";

			var t_mb = total/1024/1024;
			t_mb = t_mb.toFixed(1)+"Mb";

			$("h1").html(l_mb+"/"+t_mb);

			var p = Math.floor((loaded*100)/total);
			$(".progress-bar").css({
				width: p+"%",
			});

			$(".progress-bar").html(p+"%");

		}).send(function(error,response){
			var url = response.Location;
			var img = document.createElement("IMG");
			img.src = url;
			img.width = "400";
			$("body").append(img);
		});
	});
});