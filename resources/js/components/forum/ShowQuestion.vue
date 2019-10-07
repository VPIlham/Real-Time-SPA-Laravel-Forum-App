<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{data.title}}</h5>
            <small class="float-left">{{ data.user }}</small>
            <small class="float-right">{{ data.created_at }}</small>
            <br>
            <p class="card-text" style="opacity:0.8" v-html="body"></p>
            <footer class="blockquote-footer">5 Replies
                <div v-if="own">
                    <button class="btn btn-primary float-right" @click="edit"> Edit</button>
                    <button class="btn btn-danger float-right" @click="destroy"> Delete</button>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                own: User.own(this.data.user_id)
            }
        },
        computed: {
            body() {
                return md.parse(this.data.body)
            }
        },
        methods: {
            destroy() {
                axios.delete(`/api/question/${this.data.slug}`)
                    .then(res => this.$router.push('/forum'))
                    .catch(error => console.log(error.response.data))
            },
            edit(){
              EventBus.$emit('startEditing');
            }
        }
    }

</script>
