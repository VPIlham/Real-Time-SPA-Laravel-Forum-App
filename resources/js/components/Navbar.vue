<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Hidden brand</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <router-link to="/forum" class="nav-link" >Forum <span class="sr-only">(current)</span></router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/ask">Ask Question</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/category">Category</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/login" class="nav-link">Login</router-link>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
export default {
  name: 'navbar'
}
</script>