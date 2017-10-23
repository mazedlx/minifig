const user = window.Laravel.user;

module.exports = {
    isLoggedIn() {
        return user.id !== null;
    },
};
