<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
            <textarea id="body"
                      name="body"
                      class="form-control"
                      placeholder="Have something to say"
                      required
                      rows="5" v-model="body">
            </textarea>
            </div>

            <button type="submit"
                    class="btn btn-primary"
                    @click="addReply"
            >
                Post
            </button>
        </div>

        <p class="text-center" v-else>
            Please <a href="/login">sign in</a> to participate in this discussion!
        </p>
    </div>
</template>

<script>
    import 'jquery.caret'
    import 'at.js'

    export default {
        data () {
            return {
                body: ''
            }
        },

        methods: {
            addReply () {
                axios.post(location.pathname + '/replies', {body: this.body})
                    .catch(error => {
                        flash(error.response.data, 'danger')
                    })
                    .then(({data}) => {
                        this.body = ''
                        flash('Your reply has been posted.')
                        this.$emit('created', data)
                    })
            }
        },

        mounted () {
            $('#body').atwho({
                at: '@',
                delay: 750,
                callbacks: {
                    remoteFilter: function (query, callback) {
                        $.getJSON('/api/users', {q: query}, function (usernames) {
                            callback(usernames)
                        })
                    }
                }
            })
        }
    }
</script>