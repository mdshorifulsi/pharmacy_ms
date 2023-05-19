import Token from './token'
import appStorage from './appStorage'

class User{
	responseAfterLogin(response){
		const access_token=response.data.access_token
		const userName=response.data.name
		if(Token.isValid(access_token)){
			appStorage.store(access_token,userName)
		}
	}

	

	     hasToken() {
        const storeToken = localStorage.getItem("token");
        if (storeToken) {
            return Token.isValid(storeToken) ? true : false;
        }
        return false;
    }




  logedIn() {
        return this.hasToken();
    }
	
	// logout(){
	// 	AppStorage.clear()
	// }

	name(){
		if(this.loggedIn()){
			return localStorage.getItem('user');
		}
	}

	id(){
		if(this.loggedIn()){
			const payload=Token.payload(localStorage.getItem('token'))
			return payload.sub

		}
		return false
	}
}


export default User=new User;