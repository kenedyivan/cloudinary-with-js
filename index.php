<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Hello world</h1>


		<form id="my-form">
		<input type="text" name="firstname" id="firstname" />
	    <input type="text" name="lastname" id="lastname" />
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

		  // The configuration we've talked about above
		  url:'upload.php',
		  autoProcessQueue: false,
		  uploadMultiple: true,
		  parallelUploads: 5,
		  maxFiles: 5,

		  // The setting up of the dropzone
		  init: function() {
		    var myDropzone = this;

		    // First change the button to actually tell Dropzone to process the queue.
		    document.querySelector("button[type=submit]").addEventListener("click", function(e) {
		      // Make sure that the form isn't actually being sent.
		      e.preventDefault();
		      e.stopPropagation();
		      myDropzone.processQueue();
		    });

		    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
		    // of the sending event because uploadMultiple is set to true.
		    this.on("sendingmultiple", function() {
		      // Gets triggered when the form is actually being sent.
		      // Hide the success button or the complete form.
		      console.log('form being processed');
		    });

		    this.on("successmultiple", function(files, response) {
		      // Gets triggered when the files have successfully been sent.
		      // Redirect user or notify of success.
		      var formData = new FormData(document.getElementById("my-form"));
		      //console.log(formData.get('firstname'));

		        $.ajax({
		            type: 'POST',
		            headers: {"cache-control": "no-cache"},
		            url: "upload.php",
		            async: true,
		            cache: false,
		            dataType: "json",
		            data: formData,
		            processData: false,
		            contentType: false,
		            success: function (jsonData, textStatus, jqXHR) {

		                console.log("fname: "+jsonData["fname"]);


		            },
		            error: function (XMLHttpRequest, textStatus, errorThrown) {
		                console.log(textStatus);
		            }
		        });

		      //window.location="results.php";
		    });
		    this.on("errormultiple", function(files, response) {
		      // Gets triggered when there was an error sending the files.
		      // Maybe show form again, and notify user of error
		    });
		  }

		}
</script>
</html>
