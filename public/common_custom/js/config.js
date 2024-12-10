

function setToken(token){
    localStorage.setItem("token", `Bearer ${token}`);
}

function getToken(){
    return localStorage.getItem("token");
}



function headerToken(){
    let token = getToken(); // Get the token from localStorage
    return {
        headers: {
            Authorization: token
        }
    };
}
// function HeaderToken(){
//     let token = getToken();
//     return {
//         headers:{
//             Authorization:token
//         }
//     }
// }



// function checkToken() {
//     if (!localStorage.getItem('token')) {
//         // Redirect to login if token not found
//         window.location.href = '/login';
//     }
// }
