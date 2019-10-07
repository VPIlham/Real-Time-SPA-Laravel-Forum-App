<template>
   <div class="card" style="margin-top:8px">
      <div class="card-body">
        <h5 class="card-title">
          <router-link :to="data.path">{{ data.title }}</router-link>
          </h5>
        <p class="card-text">{{ data.body }}</p>
        <small class="form-text text-muted float-right">{{ data.user }} said {{ data.created_at }}</small>
        <a href="#" class="btn btn-primary">Lihat</a>
      </div>
    </div>
</template>

<script>
export default {
  props : ['data']
}
</script>