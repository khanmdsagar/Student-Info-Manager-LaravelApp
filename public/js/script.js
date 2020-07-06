//profile image
function preview(event){
    var read = new FileReader();
    var profileImageView = document.getElementById("profileImageView");

    read.onload = function(){
        if(read.readyState == 2){
            profileImageView.src = read.result;
        }
    }

    read.readAsDataURL(event.target.files[0]);
}


var profileCamera = document.getElementById("profileCamera");
var profileInputFile = document.getElementById("profileInputFile");

profileCamera.addEventListener("click", function(){
    profileInputFile.click();
});