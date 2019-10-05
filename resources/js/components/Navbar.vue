<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <router-link to="/" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"></router-link>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Hidden brand</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                    <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show" class="nav-item">
                        <a class="nav-link">{{ item.title }}</a>
                    </router-link>
               
            </ul>
        </div>
    </nav>

</template>

<script>
    export default {
        name: 'navbar',
        data() {
            return {
                loggedIn: User.loggedIn(),
                items: [
                    { title: "Forum", to: "/forum", show: true },
                    { title: "Ask Question", to: "/ask", show: User.loggedIn() },
                    { title: "Category", to: "/category", show: User.loggedIn() },
                    { title: "Login", to: "/login", show: !User.loggedIn() },
                    { title: "Logout", to: "/logout", show: User.loggedIn() }
                ]
            };
        },
        created(){
            EventBus.$on('logout', () => {
                User.logout();
            })
        }
    }
    

</script>
