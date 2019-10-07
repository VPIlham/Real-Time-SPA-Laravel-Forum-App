<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form @submit.prevent="create">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" placeholder="Masukan Judul" required name="title"
                            v-model="form.title">
                    </div>
                    <label for="inputState">Kategori</label>
                    <select id="inputState" class="form-control" v-model="form.category_id"  >
                        <option selected>Choose...</option>
                        <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.name}}</option>
                    </select>
                     <label for="inputState" style="margin-top:5px;">Isi</label>
                     <vue-simplemde v-model="form.body" ref="markdownEditor" />
                    <button type="submit" class="btn btn-success">Buat Pertanyaan</button>
                    <router-link to="/forum" class="btn btn-primary">Kembali</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    title: '',
                    body: '',
                    category_id : ''
                },
                categories : {},
                errors : {}
            }
        },
        created(){
          axios.get('/api/category')
          .then(res => this.categories = res.data.data)
        },
        methods: {
            create() {
              axios.post('api/question', this.form)
              // path adalah dari link api question
              .then( res => this.$router.push(res.data.path) )
              .catch( error => this.errors = error.response.data.error )
            }
        }
    }

</script>
