<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="question">
                    <edit-question v-if="editing" :data=question />
                    <!-- data itu dari props ShowQuestion -->
                    <div v-else>
                        <show-question :data=question v-if="question" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ShowQuestion from './ShowQuestion';
    import EditQuestion from './EditQuestion';

    export default {
        data() {
            return {
                question: null,
                editing: false
            }
        },
        components: {
            ShowQuestion,
            EditQuestion
        },
        created() {
            this.getQuestion()
            this.listen()
        },
        methods: {
            listen() {
                EventBus.$on('startEditing', () => {
                    this.editing = true
                })
                EventBus.$on('cancelEditing', () => {
                    this.editing = false
                })
            },
            getQuestion() {
                axios.get(`/api/question/${this.$route.params.slug}`)
                    .then(res => this.question = res.data.data)
            },
        }
    }

</script>
