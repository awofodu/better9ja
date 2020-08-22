export default class Gate {

    constructor(user){
        this.user = user;
    }

    isActive(){
        return this.user.is_activated === 1;
    }
    //
    // isAuthor(){
    //     return this.user.type === 'author';
    // }
    //
    // isUser(){
    //     return this.user.type === 'user';
    // }
    //
    // isAdminOrAuthor(){
    //     if(this.user.type === 'admin' || this.user.type === 'author'){
    //         return true;
    //     }
    // }

}