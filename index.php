<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Hello world</h1>


		<form id="my-form">
	    <div>
			<div id="my-awesome-dropzone" class="dropzone"></div>
		</div>
	    <button type="submit">Submit data and files!</button>
		</form>

</body>
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="includes/dropzone.js"></script>
<!--<script>
	//var myDropzone = new Dropzone("#myId", { url: "upload.php"});
	Dropzone.options.myAwesomeDropzone = false;
	Dropzone.options.myAwesomeDropzone = {
		url:'#',
	  paramName: "file", // The name that will be used to transfer the file
	  maxFilesize: 2, // MB
	  accept: function(file, done) {
	    if (file.name == "justinbieber.jpg") {
	      done("Naha, you don't.");
	    }
	    else { done(); }
	  }
	};
</script>-->
<script>
	//Dropzone.options.myAwesomeDropzone = false;
	Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

		/*uploadMultiple: false,
		acceptedFiles:'.jpg,.png,.jpeg,.gif',
		parallelUploads: 6,
		url: 'https://api.cloudinary.com/v1_1/kenedy/image/upload',*/

		//working on local
		/*url: 'upload.php',
		autoProcessQueue: true,
		uploadMultiple: false,*/

		url: 'https://api.cloudinary.com/v1_1/kenedy/image/upload',
		acceptedFiles:'.jpg,.png,.jpeg,.gif',
		autoProcessQueue: true,
		uploadMultiple: false,




		  // The setting up of the dropzone
		  init: function() {
		    var myDropzone = this;


		    this.on('sending', function (file, xhr, formData) {
				formData.append('api_key', 149743782894548);
				formData.append('timestamp', Date.now() / 1000 | 0);
				formData.append('upload_preset', 'vpyjhb2o');
			});

			/*this.on('sendingmultiple', function (file, xhr, formData) {
				formData.append('api_key', 149743782894548);
				formData.append('timestamp', Date.now() / 1000 | 0);
				formData.append('upload_preset', 'vpyjhb2o');
			});*/

			this.on('success', function (file, response) {
				//console.log('Success! Cloudinary public ID is', response.public_id);
				console.log(response);
			});

			/*this.on("successmultiple", function(files, response) {
		      
				console.log(response);
		      //window.location="results.php";
		    });*/

		  }

		}
</script>
</html>
