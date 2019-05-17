function checkMdp(){
	var mdp = document.getElementById("password").value;
	var mdpComfirm = document.getElementById("password_confirmation").value;
	var message;

	if (mdp != mdpComfirm){
		message = "Les deux mots de passe de sont pas les mêmes"; 
	}
	else{
		message = "OK"; 
	}

	document.getElementById("falseMdp").innerHTML = message;

}
