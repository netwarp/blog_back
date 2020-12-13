<template>
    <div class="row">
        <div class="col-md-9">
            <Post v-for="post in posts"
                  :id="post.id"
                  :preview="post.preview"
                  :content="post.content"
                  :meta="post.meta"
                  :created_at="post.created_at"
                  :updated_at="post.updated_at"
            />
        </div>
        <div class="col-md">
            <div class="card my-3">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus doloremque, eos error, facilis fugit maiores optio placeat quisquam ratione sint tempore unde ut voluptates? Consequuntur harum impedit magni minima tempora?
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Post from './Post';
    export default {
        name: 'App',

        props: [

        ],

        mounted() {
           this.fetchPosts()


            window.addEventListener('scroll', () => {
                let current_scroll = window.pageYOffset
                let limit = document.body.offsetHeight - window.innerHeight


                if (current_scroll === limit) {
                    this.page++
                    this.fetchPosts()
                }
            });
        },

        components: {
            Post
        },

        data() {
            return {
                page: 1,
                last_page: null,
                posts: []
            }
        },

        methods: {
            async fetchPosts() {
                const url = `http://localhost:8000/api/posts?page=${this.page}`;
                const response = await axios.get(url)
                let data = await response.data

                this.last_page = await response.data.meta.last_page

                for (let post of data.data) {
                    this.posts.push(post)
                }
            },

            checkScroll(event) {
                console.log(event)
            }
        },


    }
</script>
