<template>
    <form @submit.prevent="update">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" placeholder="Masukan Judul" required v-model="form.title">
        </div>
        <label for="inputState">Kategori</label>
        <select id="inputState" class="form-control" v-model="form.category_id">
            <option selected>Choose...</option>
            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{cat.name}}</option>
        </select>
        <label for="inputState" style="margin-top:5px;">Isi</label>
        <vue-simplemde v-model="form.body" ref="markdownEditor" />
        <button type="submit" class="btn btn-success">Rubah</button>
        <button class="btn btn-primary" @click="cancel">Kembali</button>
    </form>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                form: {
                    title: null,
                    body: null
                },
                categories: {}
            }
        },
        created() {
            this.form = this.data
            this.getCategory()
        },
        methods: {
            getCategory() {
                axios.get('/api/category')
                    .then(res => this.categories = res.data.data)
            },
            cancel() {
                EventBus.$emit('cancelEditing');
            },
            update() {
                axios.patch(`/api/question/${this.form.slug}`, this.form)
                    .then(res => this.cancel())
            }
        }
    }

</script>
