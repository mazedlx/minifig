const user = window.Laravel.user;

module.exports = {
    isLoggedIn() {
        return user !== null;
    },
};
