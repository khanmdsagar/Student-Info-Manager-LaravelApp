@extends('layouts.app')
@section('title','Insert Page')

@section('content')

 <!--insert Modal-->
 <div class="app">
   <div class="container center">
    <div class="box p-all20 text-center bg-white width400px round-br5" >
        <div class="ImageUpload">
            <div class="profileImageSection">
               <input name="file" type="file" onchange="preview(event)" id="profileInputFile" hidden="hidden">
               <img class="profileImageView" id="profileImageView">
               <span onclick="preview(event)" id="profileCamera" class="profileCamera material-icons">camera_alt</span>
            </div>
         </div>
        <input id="fullname" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Full Name"><br>
        <input id="roll" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Roll"><br>
        <input id="class" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Class"><br>
        <button onclick="sendData()" class="Width200 m-top10 m-bottom10 button">Insert</button>
     </div>
   </div>
</div>

<script type="text/javascript">
   
    //inserting data by axios
    function sendData(){

        var profilePhoto = document.getElementById("profileInputFile").files[0]
        
        if(profilePhoto !== undefined){
            var profilePhotoName = profilePhoto.name
            var profilePhotoExtension = profilePhotoName.split('.').pop().toLowerCase().toString()
            
            var Fullname = document.getElementById("fullname").value
            var Roll = document.getElementById("roll").value
            var Class = document.getElementById("class").value
            var profileImageView = document.getElementById("profileImageView")

            if(profilePhotoExtension != 'jpg' && profilePhotoExtension != 'jpeg' && profilePhotoExtension != 'png'){
                $toast("Only jpg jpeg png files are allowed")
            }

            else if(Fullname == "" || Roll == "" || Class == ""){
                $toast("Fields can't be empty")
            }
            
            else{
                var profilePhotoFile = new FormData()
                    profilePhotoFile.append('profilePhotoKey', profilePhoto)
                var config = {headers: {'content-type': 'multipart/form-data'}}
                var uri = "/profilePhotoFileHandler"

                axios.post(uri, profilePhotoFile, config)
                .then(function(response){

                    var profilePhotoPath = response.data
                    var profilePhotoNewPath = profilePhotoPath.split('/').pop()
                    
                    var url ='/insertData'
                    var data = {name:Fullname, roll:Roll, class:Class, photoPath:profilePhotoNewPath }

                    if(response.status == 200){
                        //data post 
                        axios.post(url, data)
                        .then(function (response) {

                            $toast(response.data)

                            document.getElementById("fullname").value = ''
                            document.getElementById("roll").value = ''
                            document.getElementById("class").value = ''
                            profileImageView.src = ''

                        })
                        .catch(function (error) {
                            $toast("Insert Failed")
                        });
                    }

                })
                .catch(function(error){
                    $toast("Can't upload photo")
                })
        }
            
        }else{
            $toast("You must select a file") 
        }

//end
}
</script>
@endsection