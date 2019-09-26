<template>
<div>
  <navbar/>
  <router-view/>
  <app-footer/>
</div>
</template>

<script>
import Navbar from './Navbar';
import AppFooter from './AppFooter';
export default {
  name : 'app-home',
  components : {
    Navbar,
    AppFooter
  }
}
</script>